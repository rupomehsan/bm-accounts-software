<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

use App\Modules\AccountManagement\AccountExpense\Actions\Validation;
use Illuminate\Support\Facades\Hash;
use App\Modules\AccountManagement\AccountLog\Actions\Store as LogStore;

class SetMonth
{
    static $model = \App\Modules\AccountManagement\AccountExpense\SetMonthModel::class;

    public static function store()
    {
        try {
            $reqMonth = request()->month;
            $activeMonth = self::$model::query()->where('active', 1)->first();
            if ($activeMonth) {
                $activeMonth->active = 0;
                $activeMonth->save();
            }
            if (!$data = self::$model::query()->where('month', $reqMonth)->first()) {
                self::$model::create(
                    [
                        "month" => $reqMonth,
                        "active" => 1
                    ]
                );
            } else {
                $data->update([
                    "month" => $reqMonth,
                    "active" => 1
                ]);
            }

            return messageResponse('Item added successfully', 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function getActiveMonth()
    {
        try {
            $activeMonth = self::$model::query()->where('active', 1)->first();
            if ($activeMonth) {
                return entityResponse($activeMonth);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
