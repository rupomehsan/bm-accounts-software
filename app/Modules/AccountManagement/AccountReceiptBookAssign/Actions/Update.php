<?php

namespace App\Modules\AccountManagement\AccountReceiptBookAssign\Actions;

use App\Modules\AccountManagement\AccountReceiptBookAssign\Actions\Validation;

class Update
{
    static $model = \App\Modules\AccountManagement\AccountReceiptBookAssign\Model::class;
    static $receiptBookModel = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $data->update($request->validated());
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
