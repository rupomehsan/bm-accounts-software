<?php

namespace App\Modules\AccountManagement\AccountLog\Actions;

class GetAllExpenseByCategoryID
{
    static $model = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute($id)
    {
        try {
            $with = ['account_expense','account_category'];
            if (!$data = self::$model::query()->with($with)->where('category_id', $id)->paginate()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
