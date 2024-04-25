<?php

namespace App\Modules\AssetManagement\AssetBrand\Actions;

use App\Modules\AssetManagement\AssetBrand\Validations\Validation;

class Update
{
    static $model = \App\Modules\AssetManagement\AssetBrand\Models\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $requestData = $request->validated();
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $requestData['logo'] = uploader($image, 'uploads/asset');
            }
            $data->update($requestData);
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
