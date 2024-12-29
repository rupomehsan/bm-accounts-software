<?php

namespace App\Modules\JamanotProvider\Actions;

use App\Modules\JamanotProvider\Actions\Validation;
use Carbon\Carbon;

class Update
{
    static $model = \App\Modules\JamanotProvider\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

            $requestdata = $request->validated();
            if ($request->hasFile('attachment')) {
                $image = $request->file('attachment');
                $imageName = uploader($image, 'uploads/loan');
                $requestdata['attachment'] = $imageName;
            } else {
                $requestdata['attachment'] = $data->attachment;
            }

            if ($data->update($requestdata)) {
                $accLog = self::$accountLogModel::find($data->account_log_id);
                $logData = [
                    'user_id' => $request->user_id,
                    'amount' => $request->amount,
                    'category_id' => $request->category_id,
                ];
                $accLog->update($logData);
                $data->update();
                return messageResponse('Item updated successfully');
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
