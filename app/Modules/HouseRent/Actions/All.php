<?php

namespace App\Modules\HouseRent\Actions;

class All
{
    static $model = \App\Modules\HouseRent\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = [];
            $data = self::$model::query();
            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }

            if (request()->has('search') && request()->input('search')) {
                $data = $data
                    ->where('location', 'like', '%' . request()->input('search') . '%')
                    ->orWhere('house_name', 'like', '%' . request()->input('search') . '%');
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
    public static function seachByDateWise()
    {
        try {
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = [];
            $data = self::$model::with($with)
                ->whereDate('created_at', '>=', request()->input('start_date'))
                ->whereDate('created_at', '<=', request()->input('end_date'))
                ->where($condition)
                ->latest()
                ->paginate($offset);
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
