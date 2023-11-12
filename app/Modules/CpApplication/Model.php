<?php

namespace App\Modules\CpApplication;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    static $userModel = \App\Modules\User\Model::class;
    static $cpApplicationValueModel = \App\Modules\CpApplicationValue\Model::class;

    protected $table = "cp_applications";
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
        return $this->belongsTo(self::$userModel, 'applicant_id');
    }
    public function application_values()
    {
        return $this->hasMany(self::$cpApplicationValueModel, "cp_application_id");
    }
}
