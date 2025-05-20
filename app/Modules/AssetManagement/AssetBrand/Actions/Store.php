<?php

namespace App\Modules\AssetManagement\AssetBrand\Actions;

use App\Modules\AssetManagement\AssetBrand\Validations\Validation;


class Store
{
    static $model = \App\Modules\AssetManagement\AssetBrand\Models\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $requestData = $request->validated();
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $requestData['logo'] = uploader($image, 'uploads/asset');
            }
            if (self::$model::query()->create($requestData)) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
