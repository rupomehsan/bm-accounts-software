<?php

namespace App\Modules\AssetManagement\AssetShopList\Actions;

use App\Modules\AssetManagement\AssetShopList\Validations\Validation;


class Store
{
    static $model = \App\Modules\AssetManagement\AssetShopList\Models\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $requestData = $request->validated();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $requestData['image'] = uploader($image, 'uploads/asset');
            }

            if (self::$model::query()->create($requestData)) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
