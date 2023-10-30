<?php

namespace App\Modules\User;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected $table = "users";
    protected $guarded = [];
    protected static function booted()
    {
        static::created(function ($data) {
            $random_no = random_int(100, 999) . $data->id . random_int(100, 999);
            $slug = $data->title . " " . $random_no;
            $data->slug = Str::slug($slug); //use Illuminate\Support\Str;
            $data->save();
        });
    }

    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }
}
