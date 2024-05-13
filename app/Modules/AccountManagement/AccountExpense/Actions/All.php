<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

class All
{
    static $model = \App\Modules\AccountManagement\AccountExpense\Model::class;
    static $supportVoucermodel = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;

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
    public static function seachByDateWise()
    {
        try {
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['account_category'];
            $data = self::$supportVoucermodel::query();


            if (request()->has('not_approved_cp') && request()->input('not_approved_cp')) {
                $condition['approved_by_cp'] =  0;
            }
            if (request()->has('not_approved_bm') && request()->input('not_approved_bm')) {
                $condition['approved_by_bm'] =  0;
            }


            $data = $data->with($with)
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
