<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;



class GetSingleSupportVoucher
{
    static $model = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;

    public static function execute($id)
    {
        try {
            $with = [];
            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
