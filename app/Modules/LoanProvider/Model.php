<?php

namespace App\Modules\LoanProvider;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    static $userModel = \App\Modules\User\Model::class;
    static $loanPaymentModel = \App\Modules\LoanPayment\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;

    protected $table = "loan_providers";
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

    public function user()
    {
        return $this->belongsTo(self::$userModel, 'user_id');
    }
    public function loan_payment()
    {
        return $this->hasOne(self::$loanPaymentModel, 'loan_provide_id');
    }
    public function loan_payments()
    {
        return $this->hasMany(self::$loanPaymentModel, 'loan_provide_id');
    }
    public function account_log()
    {
        return $this->belongsTo(self::$accountLogModel, 'account_log_id');
    }
}
