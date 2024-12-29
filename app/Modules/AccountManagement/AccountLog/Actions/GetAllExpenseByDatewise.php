<?php

namespace App\Modules\AccountManagement\AccountLog\Actions;

use Carbon\Carbon;

class GetAllExpenseByDatewise
{
    static $model = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute()
    {
        try {
            $startDate = request()->input('start_date');
            $endDate = request()->input('end_date');

            if ($startDate > $endDate) {
                return messageResponse('Start date must be less then or equal end date ', 404, 'error');
            }

            $with = ['account_expense'];
            $data = self::$model::query()->where('is_expense', 1)
                ->with($with)
                ->when(request('category_id'), function ($query) {
                    $query->where('category_id', request('category_id'));
                })
                ->whereBetween('created_at', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay()
                ])
                ->paginate();
            if ($data->isEmpty()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
