<?php

namespace App\Modules\AccountManagement\AccountReceiptBook;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected $table = "account_receipt_books";
    protected $guarded = [];
    static $model = \App\Modules\AccountManagement\AccountReceiptBookAssign\Model::class;
    static $incomeModel = \App\Modules\AccountManagement\AccountIncome\Model::class;

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

    public function receipt_book_assing()
    {
        return $this->hasMany(self::$model, 'account_receipt_book_id');
    }

    public function account_income()
    {
        return $this->hasMany(self::$incomeModel, 'account_receipt_book_id');
    }
}
