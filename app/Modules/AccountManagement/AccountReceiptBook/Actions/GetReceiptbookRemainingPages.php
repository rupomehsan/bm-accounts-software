<?php

namespace App\Modules\AccountManagement\AccountReceiptBook\Actions;

use App\Modules\AccountManagement\AccountReceiptBook\Actions\Validation;

class GetReceiptbookRemainingPages
{
    static $model = \App\Modules\AccountManagement\AccountIncome\Model::class;
    static $receiptBookmodel = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;

    public static function execute($id)
    {
        try {
            // dd(request()->all());
            $data = self::$model::query()->where('account_receipt_book_id', $id)->get()->pluck('account_receipt_no')->toArray();
            $receiptBookdata = self::$receiptBookmodel::find($id);

            $minNumber = $receiptBookdata->receipt_start_serial_no;
            $maxNumber = $receiptBookdata->receipt_end_serial_no;

            $newData = [];
            for ($i = $minNumber; $i <= $maxNumber; $i++) {
                $newData[] = [
                    "number" => $i,
                    "is_disabled" => in_array($i, $data) ? true  : false
                ];
            }

            $response = [
                'data' => $newData,
                'maxNumber' => $maxNumber,
                'minNumber' => $minNumber,
            ];

            return entityResponse($response);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
