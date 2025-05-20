<?php

namespace App\Modules\LoanProvider\Actions;

use App\Modules\LoanProvider\Actions\Validation;
use Carbon\Carbon;

class Update
{
    static $model = \App\Modules\LoanProvider\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $userModel = \App\Modules\User\Model::class;

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
            }

            $requestdata['due_amount'] = $requestdata['amount'];

            if ($data->update($requestdata)) {
                $accLog = self::$accountLogModel::find($data->account_log_id);
                $user = self::$userModel::find($request->user_id);
                $logData = [
                    "user_id" => $request->user_id,
                    "user_type" => $user->roles[0]->name,
                    "date" =>  $request->taken_date,
                    "name" => $user->name,
                    "amount" => $request->amount,
                    "creator" => auth()->id(),
                    'account_id' => $request->account_id,
                    'account_number_id' => $request->account_number_id,
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
