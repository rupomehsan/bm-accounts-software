<?php

namespace App\Modules\AccountManagement\AccountIncome\Actions;

class SearchIncome
{
    static $model = \App\Modules\AccountManagement\AccountIncome\Model::class;

    public static function execute()
    {
        try {

            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $orderByCol = 'id';
            $orderByType = 'desc';
            $with = ['user_roles:id,name', 'account_category:id,title'];
            $data = self::$model::query();
            $startDate = request()->input('start_date');
            $endDate = request()->input('end_date');
            $data = self::$model::whereBetween('date', [$startDate, $endDate]);
            if (request()->has('central_division_id')) {
                $data->where('central_division_id', request()->central_division_id);
            }
            if (request()->has('account_category_id')) {
                $data->where('account_category_id', request()->account_category_id);

            }
            if (request()->has('branch_id')) {
                $data->where('branch_id', request()->branch_id);
            }
            $data = $data->with($with)
                ->where($condition)
                ->latest()
                ->orderBy($orderByCol, $orderByType)
                ->paginate($offset);

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
