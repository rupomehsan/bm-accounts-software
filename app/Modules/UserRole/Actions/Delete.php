<?php

namespace App\Modules\UserRole\Actions;

class Delete
{
    static $model = \App\Modules\UserRole\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data=self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $data->delete();
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}