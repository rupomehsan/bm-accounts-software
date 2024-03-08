<?php

namespace App\Modules\OfficeRent\Actions;

use App\Modules\OfficeRent\Actions\Validation;

class Update
{
    static $model = \App\Modules\OfficeRent\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $accLog = self::$accountLogModel::find($data->account_log_id);
            $logData = [
                'user_id' => $request->user_id,
                'amount' => $request->amount,
            ];
            $accLog->update($logData);
            $data->update($request->validated());

            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
