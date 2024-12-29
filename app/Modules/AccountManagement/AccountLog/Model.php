<?php

namespace App\Modules\AccountManagement\AccountLog;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    static $AccountIncomeModel = \App\Modules\AccountManagement\AccountIncome\Model::class;
    static $AccountExpenseModel = \App\Modules\AccountManagement\AccountExpense\Model::class;
    static $AccountCateogryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;
    static $userModel = \App\Modules\User\Model::class;

    protected $table = "account_logs";
    protected $guarded = [];

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

    public function account_incomes()
    {
        return $this->hasOne(self::$AccountIncomeModel, 'account_log_id');
    }
    public function account_expense()
    {
        return $this->hasOne(self::$AccountExpenseModel, 'account_log_id');
    }
    public function user()
    {
        return $this->belongsTo(self::$userModel, 'user_id');
    }
    public function account_category()
    {
        return $this->belongsTo(self::$AccountCateogryModel, 'category_id');
    }

    
}
