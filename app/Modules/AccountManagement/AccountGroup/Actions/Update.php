<?php

namespace App\Modules\AccountManagement\AccountGroup\Actions;

use App\Modules\AccountManagement\AccountGroup\Validations\Validation;

class Update
{
    static $model = \App\Modules\AccountManagement\AccountGroup\Models\Model::class;

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