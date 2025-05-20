<?php

namespace App\Modules\AccountManagement\AccountReceiptBookAssign\Actions;

class All
{
    static $model = \App\Modules\AccountManagement\AccountReceiptBookAssign\Model::class;

    public static function execute()
    {
        try {

            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['account_receipt_book', 'user'];
            $data = self::$model::query();
            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }

            if (request()->has('user_id') && request()->input('user_id')) {
                $condition['division_id'] = request()->input('user_id');
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
