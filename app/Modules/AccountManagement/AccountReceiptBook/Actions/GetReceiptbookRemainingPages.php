<?php

namespace App\Modules\AccountManagement\AccountReceiptBook\Actions;

use App\Modules\AccountManagement\AccountReceiptBook\Actions\Validation;

class GetReceiptbookRemainingPages
{
    static $model = \App\Modules\AccountManagement\AccountIncome\Model::class;

    public static function execute($id)
    {
        try {
            // dd(request()->all());
            $data = self::$model::query()->where('account_receipt_book_id', $id)->get()->pluck('account_receipt_no')->toArray();

            $maxNumber = max($data);
            $minNumber = min($data);


            $response = [
                'data' => $data,
                'maxNumber' => $maxNumber,
                'minNumber' => $minNumber,
            ];
            return entityResponse($response);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
