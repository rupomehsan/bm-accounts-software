<?php

namespace App\Modules\AssetManagement\AssetWaranty\Actions;

use App\Modules\AssetManagement\AssetWaranty\Validations\Validation;


class Store
{
    static $model = \App\Modules\AssetManagement\AssetWaranty\Models\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $requestData = $request->validated();
            if ($request->hasFile('waranty_card_image')) {
                $image = $request->file('waranty_card_image');
                $requestData['waranty_card_image'] = uploader($image, 'uploads/asset');
            }
            if (self::$model::query()->create($requestData)) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
