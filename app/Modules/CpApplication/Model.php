<?php

namespace App\Modules\CpApplication;

use App\Models\TargetMoukuf;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    static $userModel = \App\Modules\User\Model::class;
    static $cpApplicationValueModel = \App\Modules\CpApplicationValue\Model::class;
    static $applicationCategoryModel = \App\Modules\CpApplicationCategory\Model::class;

    protected $table = "cp_applications";
    protected $appends = ['applied'];
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
    public function application_category()
    {
        return $this->belongsTo(self::$applicationCategoryModel, 'cp_application_category_id');
    }
    public function targetMoukuf()
    {
        return $this->hasOne(TargetMoukuf::class, 'application_id');
    }
    public function getAppliedAttribute()
    {
        return $this->targetMoukuf()->exists();
    }
}
