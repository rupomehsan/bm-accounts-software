<?php

namespace App\Modules\AccountManagement\AccountIncome\Actions;

use Illuminate\Support\Facades\DB;

class All
{
    static $model = \App\Modules\AccountManagement\AccountIncome\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $orderByCol =  request()->input('sort_by_col') ?? 'id';
            $orderByType = request()->input('sort_by_type') ?? 'asc';
            $with = ['user_roles:id,name', 'account_category:id,title','receipt_book'];
            $data = self::$model::query();

            if (request()->has('branch_id') && request()->input('branch_id')) {
                $data = $data->whereNotNull('branch_id');
            }

            if (request()->has('central_division_id') && request()->input('central_division_id')) {
                $condition['central_division_id'] = auth()->id();

            }
            if (request()->has('central_division_id') && request()->input('central_division_id')) {
                $data = $data->whereNotNull('central_division_id');
            }

            if (request()->has('account_category_id') && request()->input('account_category_id')) {
                $condition['account_category_id'] = request()->input('account_category_id');
            }

            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }

            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('title', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('orderByCol') && request()->input('orderByCol')) {

                $orderByCol = request()->input('orderByCol');
            }
            if (request()->has('orderByType') && request()->input('orderByType')) {
                $orderByType = request()->input('orderByType');
            }


            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {
                $data = $data->with($with)
                    ->where($condition)
                    ->orderBy($orderByCol, $orderByType)
                    ->paginate($offset);
            }

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
