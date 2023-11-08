<?php

namespace App\Modules\AccountLog\Actions;

use App\Modules\AccountLog\Actions\Validation;


class Store
{
    static $model = \App\Modules\AccountLog\Model::class;

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