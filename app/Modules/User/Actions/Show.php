<?php

namespace App\Modules\User\Actions;


class Show
{
    static $model = \App\Modules\User\Model::class;

    public static function execute($id)
    {
        try {
            $with = ['roles'];
            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
