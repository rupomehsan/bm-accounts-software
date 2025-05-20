<?php

namespace App\Modules\AccountManagement\AccountReceiptBookAssign\Actions;

use App\Modules\AccountManagement\AccountReceiptBookAssign\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\AccountManagement\AccountReceiptBookAssign\Model::class;


    public static function execute(Validation $request)
    {
        try {
            $isExist = self::$model::query()
                ->where('account_receipt_book_id', $request->input('account_receipt_book_id'))
                ->first();
            if ($isExist) {
                return messageResponse('This receipt book already assign', 404, 'error');
            }
            if (self::$model::query()->create($request->validated())) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
