<?php

namespace App\Modules\AccountManagement\Account\Actions;

use App\Modules\AccountManagement\Account\Actions\Validation;

class Update
{
    static $model = \App\Modules\AccountManagement\Account\Model::class;
    static $accountNumberModel = \App\Modules\AccountManagement\AccountNumber\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            if ($data->update($request->validated())) {
                $accountNumberExist = self::$accountNumberModel::where('account_id', $id)->first();
                if ($accountNumberExist) {
                    $accountNumberExist->value = $request->input('value');
                    $accountNumberExist->update();
                } else {
                    $accountNumber = new self::$accountNumberModel();
                    $accountNumber->value = $request->input('value');
                    $accountNumber->account_id = $id;
                    $accountNumber->save();
                }

                return messageResponse('Item updated successfully');
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
