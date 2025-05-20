<?php

namespace App\Modules\UserNotification\Actions;

class All
{
    static $model = \App\Modules\UserNotification\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['user:id,full_name,email,phone,image'];
            $data = self::$model::query();
            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }

            if (auth()->id() && auth()->user()->roles()->first()->id != 3) {
                $condition['user_id'] = auth()->id();
            }


            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('topic', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                if (request()->has('seen') && (int)request()->input('seen') == 0) {
                    $condition['seen'] = request()->input('seen');
                    $condition['user_id'] = auth()->id();
                }
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {
                if (request()->has('cp') && request()->input('cp')) {
                    $data = $data->with($with)->latest()->paginate($offset);
                    return entityResponse($data);
                }
                $data = $data->with($with)->where($condition)->latest()->paginate($offset);
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
