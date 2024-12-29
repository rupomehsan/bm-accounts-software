<?php

namespace App\Modules\AccountManagement\AccountExpense;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected $table = "account_expenses";
    protected $guarded = [];
    protected $appends = ['approval'];

    static $model = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;
    static $userModel = \App\Modules\User\Model::class;
    static $accountCategoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;

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

    public function support_voucher()
    {
        return $this->hasMany(self::$model, 'expense_id');
    }

    public function department()
    {
        return $this->belongsTo(self::$userModel, 'department_id');
    }
    public function creator()
    {
        return $this->belongsTo(self::$userModel, 'creator');
    }

    public function account_category()
    {
        return $this->belongsTo(self::$accountCategoryModel, 'account_expense_category_id');
    }

    public function getApprovalAttribute()
    {
        $totalSubVoucher = $this->support_voucher()->count();

        $approved_by_admin_total = $this->support_voucher()->where('approved_by_admin', 1)->count();
        $approved_by_admin = $totalSubVoucher == $approved_by_admin_total;

        $approved_by_sp_bm_total = $this->support_voucher()->where('approved_by_sp_bm', 1)->count();
        $approved_by_sp_bm = $totalSubVoucher == $approved_by_sp_bm_total;

        $approved_by_bm_total = $this->support_voucher()->where('approved_by_bm', 1)->count();
        $approved_by_bm = $totalSubVoucher == $approved_by_bm_total;

        $approved_by_cp_total = $this->support_voucher()->where('approved_by_cp', 1)->count();
        $approved_by_cp = $totalSubVoucher == $approved_by_cp_total;


        return  (object)[
            "approved_by_admin" =>  $approved_by_admin,
            "approved_by_admin_total" => $approved_by_admin_total,
            "approved_by_bm" => $approved_by_bm,
            "approved_by_bm_total" => $approved_by_bm_total,
            "approved_by_sp_bm" => $approved_by_sp_bm,
            "approved_by_sp_bm_total" => $approved_by_sp_bm_total,
            "approved_by_cp" => $approved_by_cp,
            "approved_by_cp_total" => $approved_by_cp_total,
            "total_sub_voucher" =>  $totalSubVoucher,
        ];
    }


}
