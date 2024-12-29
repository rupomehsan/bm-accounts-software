<?php

namespace App\Modules\AccountManagement\AccountLog\Actions;

use Carbon\Carbon;

class getExpenseTotal
{
    static $model = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute()
    {
        try {

            $condition = [];

            $data = self::$model::query();
            if (request()->has('category_id') && request()->input('category_id')) {
                $condition['category_id'] = request()->input('category_id');
            }
            $data = $data->where('is_expense', 1)->where($condition)->sum('amount');


            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
