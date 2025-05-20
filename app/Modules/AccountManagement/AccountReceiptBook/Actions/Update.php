<?php

namespace App\Modules\AccountManagement\AccountReceiptBook\Actions;

use App\Modules\AccountManagement\AccountReceiptBook\Actions\Validation;

class Update
{
    static $model = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;

    public static function execute($account_receipt_book, $request)
    {
        try {
            // dd(request()->all());
            if (!$data = self::$model::query()->where('id', $account_receipt_book->id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $data->update($request->validated());
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function acceptReceiptBook($id)
    {
        try {
            // dd(request()->all());
           
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            if(request()->status == 'approved'){
                $data->update(['is_approvel' => 1]);
            }
            if(request()->status == 'reject'){
                $data->update([
                    'is_approvel' => 0,
                    'is_rejected' => 1,
                    'comment' => request()->comment,
                ]);
            }
           
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
