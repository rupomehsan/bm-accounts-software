<?php

namespace App\Modules\AccountManagement\AccountBranchTarget\Actions;

class All
{
    static $model = \App\Modules\AccountManagement\AccountBranchTarget\Model::class;

    public static function execute()
    {
        try {
           
            $offset = request()->input('offset') ?? 10;
            $condition = [];

            $with = ['account_category:id,title', 'user:id,full_name'];
            $data = self::$model::query();
            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }

            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('title', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('session') && request()->input('session')) {
                $data = $data->whereYear('session', request()->input('session'));
            }

            if (request()->input('startDate') && request()->input('endDate')) {
                $data = $data->whereBetween('session', [request()->input('startDate'), request()->input('endDate')]);
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {
                $data = $data->with($with)->where($condition)->latest()->paginate($offset);
            }


            $session = array_unique(self::$model::pluck('session')->map(function ($item) {
                return explode('-', $item)[0];
            })->toArray());


            $data = [
                'data' => $data,
                'session' => $session
            ];

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
