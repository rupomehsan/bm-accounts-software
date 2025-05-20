<?php

namespace App\Modules\UserPermission\Actions;

use App\Modules\UserPermission\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\UserPermission\Model::class;

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