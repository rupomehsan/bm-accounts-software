<?php

namespace App\Modules\AccountManagement\AccountNumber;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected $table = "account_numbers";
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
      return $this->hasMany('App\Modules\AccountManagement\AccountLog\Model', 'account_number_id', 'id');
    }
}
