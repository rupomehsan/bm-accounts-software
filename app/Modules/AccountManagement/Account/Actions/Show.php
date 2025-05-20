<?php

namespace App\Modules\AccountManagement\Account\Actions;

class Show
{
    static $model = \App\Modules\AccountManagement\Account\Model::class;

    public static function execute($id)
    {
        try {
            $with = ['account_number:id,account_id,value'];
            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
