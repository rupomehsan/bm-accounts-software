<?php

namespace App\Modules\AssetManagement\AssetAudit\Actions;

use App\Modules\AssetManagement\AssetAudit\Validations\Validation;

class Update
{
    static $model = \App\Modules\AssetManagement\AssetAudit\Models\Model::class;

    public static function execute(Validation $request,$id)
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
}