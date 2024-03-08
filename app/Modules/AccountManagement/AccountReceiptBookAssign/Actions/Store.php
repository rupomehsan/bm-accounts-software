<?php

namespace App\Modules\AccountManagement\AccountReceiptBookAssign\Actions;

use App\Modules\AccountManagement\AccountReceiptBookAssign\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\AccountManagement\AccountReceiptBookAssign\Model::class;
    static $receiptBookModel = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;

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
