<?php

namespace App\Modules\AccountManagement\AccountCategory\Actions;

class Delete
{
    static $model = \App\Modules\AccountManagement\AccountCategory\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data = self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }

            if ($data->is_default == 1) {
                return messageResponse('Sorry you can not deleted this item', 404, 'error');
            }

            $accountCategory = self::$accountLogModel::find($id);
            if (!$accountCategory) {
                $data->delete();
                return messageResponse('Item successfully deleted', 200, 'success');
            } else {
                return messageResponse('Sorry you can not deleted this item', 404, 'error');
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
