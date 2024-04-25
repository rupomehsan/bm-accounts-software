<?php

namespace App\Modules\AssetManagement\AssetItem\Actions;

use App\Modules\AssetManagement\AssetItem\Validations\Validation;


class Store
{
    static $model = \App\Modules\AssetManagement\AssetItem\Models\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $requestData = $request->validated();
            if ($request->hasFile('waranty_image')) {
                $image = $request->file('waranty_image');
                $requestData['waranty_image'] = uploader($image, 'uploads/asset');
            }
            if ($request->hasFile('item_image')) {
                $image = $request->file('item_image');
                $requestData['item_image'] = uploader($image, 'uploads/asset');
            }
            if (self::$model::query()->create($requestData)) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
