<?php

namespace App\Modules\AssetManagement\AssetRequestToCp\Actions;

use App\Modules\AssetManagement\AssetRequestToCp\Validations\Validation;


class Store
{
    static $model = \App\Modules\AssetManagement\AssetRequestToCp\Models\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $requestData = $request->validated();
            if ($request->hasFile('quotation_image')) {
                $image = $request->file('quotation_image');
                $requestData['quotation_image'] = uploader($image, 'uploads/asset');
            }
            $requestData['creator'] = auth()->id();
            if (self::$model::query()->create($requestData)) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
