<?php

namespace App\Modules\AccountManagement\AccountExpense;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class SetMonthModel extends EloquentModel
{
    protected $table = "account_expense_months";
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
}
