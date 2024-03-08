<?php

namespace App\Modules\AccountManagement\AccountNumber\Actions;

class Show
{
    static $model = \App\Modules\AccountManagement\AccountNumber\Model::class;

    public static function execute($id)
    {
        try {

            $with = [];

            if (request()->input('account_id')) {
      
                $data = self::$model::query()->with($with)->where('account_id', $id)->first();
                return entityResponse($data);
            }

            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
