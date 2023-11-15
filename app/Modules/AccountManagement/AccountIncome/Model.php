<?php

namespace App\Modules\AccountManagement\AccountIncome;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;

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

    public function account_logs(){
      return $this->belongsTo(self::$accountLogModel,'account_log_id');
    }
}
