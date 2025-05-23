<?php

namespace App\Modules\AccountManagement\AccountIncome\Actions;

class Show
{
    static $model = \App\Modules\AccountManagement\AccountIncome\Model::class;

    public static function execute($id)
    {
        try {
            $with = ['branch_user:id,full_name', 'branch_user.roles:id,name', 'account_logs', 'account_category:id,title', 'receipt_book'];


            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
