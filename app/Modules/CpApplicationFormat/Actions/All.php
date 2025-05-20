<?php

namespace App\Modules\CpApplicationFormat\Actions;

class All
{
    static $model = \App\Modules\CpApplicationFormat\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 20;
            $condition = [];
            $with = ['application_category:id,title'];
            $data = self::$model::query();
            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }

            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('title', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {
                $data = $data->with($with)->where($condition)->latest()->paginate($offset)->groupBy('cp_application_category_id');
            }

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
