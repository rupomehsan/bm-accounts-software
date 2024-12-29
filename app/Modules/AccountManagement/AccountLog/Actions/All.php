<?php

namespace App\Modules\AccountManagement\AccountLog\Actions;

class All
{
    static $model = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['account_incomes:id,account_receipt_no', 'account_category'];
            $data = self::$model::query();

            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }
            if (request()->has('income') && request()->input('income')) {
                $condition['is_income'] = request()->input('income');
            }
            if (request()->has('expense') && request()->input('expense')) {
                $condition['is_expense'] = request()->input('expense');
            }

            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('title', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {
                $data = $data->with($with)->where($condition)->latest()->paginate($offset);
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
