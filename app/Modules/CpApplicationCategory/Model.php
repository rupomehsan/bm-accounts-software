<?php

namespace App\Modules\CpApplicationCategory;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{

    static $cpApplicationModel = \App\Modules\CpApplication\Model::class;

    protected $table = "cp_application_categories";
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

    public function cp_application_approved()
    {
        return $this->hasMany(self::$cpApplicationModel, "cp_application_category_id")->where('is_approve', 1);
    }

    public function cp_application_dis_approved()
    {
        return $this->hasMany(self::$cpApplicationModel, "cp_application_category_id")->where('is_approve', 0);
    }

    public function applications()
    {
        return $this->hasMany(self::$cpApplicationModel, "cp_application_category_id")->where('is_approve', request()->is_approve);
    }

   
}
