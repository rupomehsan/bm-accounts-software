<?php

namespace App\Modules\AccountManagement\AccountReceiptBook\Actions;

class Show
{
    static $model = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;

    public static function execute($id)
    {
        try {
            $with = [];
            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function latestAccountReceiptBook()
    {
        try {

            $data = self::$model::orderBy('receipt_end_serial_no', 'desc')->first();

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
