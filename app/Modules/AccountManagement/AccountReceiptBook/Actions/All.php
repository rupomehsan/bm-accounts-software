<?php

namespace App\Modules\AccountManagement\AccountReceiptBook\Actions;

class All
{
    static $model = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = [];
            $data = self::$model::query();

            if (request()->has('is_approvel') && request()->input('is_approvel')) {
                $condition['is_approvel'] =  request()->input('is_approvel') == 'approved' ? 1 : 0;
            }

            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('title', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {
                $data = $data->with($with)->where($condition)->latest()->paginate($offset);
                // dd($data);
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
