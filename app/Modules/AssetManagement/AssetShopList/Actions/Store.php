<?php

namespace App\Modules\AssetManagement\AssetShopList\Actions;

use App\Modules\AssetManagement\AssetShopList\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\AssetManagement\AssetShopList\Model::class;

    public static function execute(Validation $request)
    {
        try {
            if (self::$model::query()->create($request->validated())) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
