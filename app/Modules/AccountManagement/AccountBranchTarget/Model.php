<?php

namespace App\Modules\AccountManagement\AccountBranchTarget;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    static $accountModel = \App\Modules\AccountManagement\AccountCategory\Model::class;
    static $userModel = \App\Modules\User\Model::class;
    static $cpApplicationModel = \App\Modules\CpApplication\Model::class;

    protected $table = "account_branch_targets";
    protected $guarded = [];
    protected $appends = ['last_comment'];

    protected $casts = [
        "comment" => "array"
    ];

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

    public function account_category()
    {
        return $this->belongsTo(self::$accountModel, 'account_category_id');
    }

    public function user()
    {
        return $this->belongsTo(self::$userModel, 'branch_id');
    }

    protected function lastComment(): Attribute
    {
        return Attribute::make(
            function (mixed  $value, array $data) {
                $comment = json_decode($data['comment']);
                return  end($comment);
            },
        );
    }

    public function cp_application()
    {
        return $this->hasOne(self::$cpApplicationModel, 'applicant_id', 'branch_id');
    }


}
