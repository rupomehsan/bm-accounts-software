<?php

namespace App\Modules\AssetManagement\AssetAuditList\Actions;



class Show
{
    static $model = \App\Modules\AssetManagement\AssetAuditList\Models\Model::class;

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