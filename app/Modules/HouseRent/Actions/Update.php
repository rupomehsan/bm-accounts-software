<?php

namespace App\Modules\HouseRent\Actions;

use App\Modules\HouseRent\Actions\Validation;

class Update
{
    static $model = \App\Modules\HouseRent\Model::class;
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
