<?php

namespace App\Modules\AccountManagement\AccountIncome;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $userRoleModel = \App\Modules\UserRole\Model::class;
    static $accountCategoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;
    static $accountReceiptBookModel = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;

    protected $table = "account_incomes";
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

    public function account_logs()
    {
        return $this->belongsTo(self::$accountLogModel, 'account_log_id');
    }
    public function user_roles()
    {
        return $this->belongsTo(self::$userRoleModel, 'branch_id');
    }
    public function account_category()
    {
        return $this->belongsTo(self::$accountCategoryModel, 'account_category_id');
    }
    public function receipt_book()
    {
        return $this->belongsTo(self::$accountReceiptBookModel, 'account_receipt_book_id');
    }


}
