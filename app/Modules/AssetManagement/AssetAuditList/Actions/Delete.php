<?php

namespace App\Modules\AssetManagement\AssetAuditList\Actions;

class Delete
{
    static $model = \App\Modules\AssetManagement\AssetAuditList\Models\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data=self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $data->delete();
            return messageResponse('Item Successfully deleted', 200, 'success');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}