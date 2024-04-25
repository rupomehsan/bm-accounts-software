<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

class All
{
    static $model = \App\Modules\AccountManagement\AccountExpense\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->input('approved'));
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['account_category'];
            $data = self::$model::query();

            if (request()->has('bm') && request()->input('bm')) {
                $condition['department_id'] = 5;
            }

            if (request()->has('approved') && request()->input('approved')) {

                $condition['approved'] = request()->input('approved') == 'yes' ? 1 : 0;
            }

            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
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
