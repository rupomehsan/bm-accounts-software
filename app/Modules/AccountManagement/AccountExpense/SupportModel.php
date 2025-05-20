<?php

namespace App\Modules\AccountManagement\AccountExpense;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class SupportModel extends EloquentModel
{
    protected $table = "account_expense_support_table";
    protected $guarded = [];
    static $model = \App\Modules\AccountManagement\AccountExpense\SupportImageModel::class;
    static $accountCategoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;

    protected $appends = ['approved_by_upperadmin'];

    protected static function booted()
    {
        static::created(function ($data) {
            $random_no = random_int(100, 999) . $data->id . random_int(100, 999);
            $slug = $data->title . " " . $random_no;
            $data->slug = Str::slug($slug);
            $data->save();
        });
    }

    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }

    public function image_url()
    {
        return $this->belongsTo(self::$model, 'image_id');
    }
    public function account_category()
    {
        return $this->belongsTo(self::$accountCategoryModel, 'account_expense_category_id');
    }
    public function getApprovedByUpperadminAttribute()
    {
        $userRole = auth()->user()->roles[0]->serial;
        $rolesSerial = [
            "8" =>  'support_admin',
            "7" =>  'approved_by_admin',
            "6" =>  'approved_by_sp_bm',
            "5" =>  'approved_by_bm',
            "3" => 'approved_by_cp'
        ];

        $roleSerial2 = [
            "8", //  'support_admin',
            "7", //  'approved_by_admin',
            "6", //  'approved_by_bm',
            "5", //  'approved_by_bm',
            "3", // 'approved_by_cp'
        ];



        $upperAdminRole = array_search($userRole, $roleSerial2) + ($userRole == 3 ? 0 : 1); //+ 1 selo cp te pblm kore
        $upperAdmin = $rolesSerial[$roleSerial2[$upperAdminRole]];

        if ($this->$upperAdmin == 1) {
            return 1;
        }
        return 0;
    }
}
