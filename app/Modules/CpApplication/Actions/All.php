<?php

namespace App\Modules\CpApplication\Actions;

class All
{
    static $model = \App\Modules\CpApplication\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['application_category:id,title', 'user:id,full_name'];
            $data = self::$model::query();

            if (request()->has('is_approve') && request()->input('is_approve')) {
                $condition['is_approve'] =  request()->input('is_approve') == 'approved' ? 1 : 0;
            }

            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }

            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('subject', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {
                $data = $data->with($with)->where($condition)->latest()->paginate($offset);
            }
            $paylod = [
                'data' => $data,
                'totalApproved' => self::$model::where('is_approve', 1)->count(),
                'totalNotApproved' => self::$model::where("is_approve", 0)->count()
            ];
            return entityResponse($paylod);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
