<?php

namespace App\Modules\AssetManagement\AssetAuditList\Actions;

use App\Modules\AssetManagement\AssetAuditList\Validations\Validation;

class Update
{
    static $model = \App\Modules\AssetManagement\AssetAuditList\Models\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $requestData = $request->validated();
            $data->update($requestData);
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function assetAuditUpdate()
    {
        try {
            self::$model::create(request()->all());
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
