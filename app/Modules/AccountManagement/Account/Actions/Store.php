<?php

namespace App\Modules\AccountManagement\Account\Actions;

use App\Modules\AccountManagement\Account\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\AccountManagement\Account\Model::class;

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
