<?php

namespace App\Modules\AccountManagement\AccountReceiptBookAssign;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected $table = "account_receipt_book_assigns";
    protected $guarded = [];
    static $accountReceiptBookModel = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;
    static $userModel = \App\Modules\User\Model::class;

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


    public function account_receipt_book()
    {
        return $this->belongsTo(self::$accountReceiptBookModel);
    }

    public function user()
    {
        return $this->belongsTo(self::$userModel, 'division_id');
    }
}
