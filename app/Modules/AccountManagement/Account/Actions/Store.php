<?php

namespace App\Modules\AccountManagement\Account\Actions;

use App\Modules\AccountManagement\Account\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\AccountManagement\Account\Model::class;
    static $accountNumberModel = \App\Modules\AccountManagement\AccountNumber\Model::class;

    public static function execute(Validation $request)
    {
        try {
            if ($data = self::$model::query()->create($request->validated())) {
                $accountNumber = new self::$accountNumberModel();
                $accountNumber->value = $request->input('value');
                $accountNumber->account_id = $data->id;
                $accountNumber->save();
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
