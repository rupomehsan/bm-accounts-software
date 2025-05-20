<?php

namespace App\Modules\AccountManagement\AccountCategory\Actions;

class All
{
    static $model = \App\Modules\AccountManagement\AccountCategory\Model::class;

    public static function execute()
    {
        try {

            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = [];
            $data = self::$model::query()->orderBy('serial_number', 'asc');

            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }

            if (request()->has('type') && request()->input('type')) {

                $condition['type'] = request()->input('type');
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
