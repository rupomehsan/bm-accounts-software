<?php

namespace App\Modules\User;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Model extends EloquentModel
{
    static $userRoleModel = \App\Modules\UserRole\Model::class;

    protected $table = "users";
    protected $guarded = [];
    protected $appends = ['title'];
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

    public function roles()
    {
        return $this->belongsToMany(self::$userRoleModel, 'user_user_role', 'user_id', 'user_role_id', 'id', 'serial');
    }

    public function permissions()
    {
        return $this->belongsToMany(UserPermission::class, 'user_user_permission', 'user_id', 'user_permission_id', 'id', 'permission_serial'); //user::id
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            function (mixed  $value, array $data) {
                return $data['full_name'];
            },
        );
    }
}
