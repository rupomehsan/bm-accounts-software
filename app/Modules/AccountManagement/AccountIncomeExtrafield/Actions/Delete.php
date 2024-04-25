<?php

namespace App\Modules\AccountManagement\AccountIncomeExtrafield\Actions;

class Delete
{
    static $model = \App\Modules\AccountManagement\AccountIncomeExtrafield\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data=self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $data->delete();
            return messageResponse('Item successfully deleted', 200, 'success');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
