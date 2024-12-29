<?php

namespace App\Modules\AssetManagement\AssetQuotations\Product\Actions;

use App\Modules\AssetManagement\AssetQuotations\Product\Validations\Validation;


class Store
{
    static $model = \App\Modules\AssetManagement\AssetQuotations\Product\Models\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $requestData = $request->validated();
            
            if (self::$model::query()->create($requestData)) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
