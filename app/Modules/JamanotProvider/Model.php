<?php

namespace App\Modules\JamanotProvider;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    static $userModel = \App\Modules\User\Model::class;
    static $jamanotPaymentModel = \App\Modules\JamanotPayment\Model::class;

    protected $table = "jamanot_providers";
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
    public function jamanot_payment()
    {
        return $this->hasOne(self::$jamanotPaymentModel, 'jamanot_provide_id');
    }
}
