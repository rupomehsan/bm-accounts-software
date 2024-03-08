<?php

namespace App\Modules\AccountManagement\AccountIncome\Actions;

use App\Modules\AccountManagement\AccountIncome\Actions\Validation;

class Update
{
    static $model = \App\Modules\AccountManagement\AccountIncome\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $userModel = \App\Modules\User\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {

            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }


            $data->update($request->validated());
            $userName = self::$userModel::find($data->branch_id);
            $accountLogModel = self::$accountLogModel::query()->where('id', $data->account_log_id)->first();
            $accountLogModel->user_id = $data->branch_id;
            $accountLogModel->user_type = "branch";
            $accountLogModel->date = $data->date;
            $accountLogModel->name = $userName ? $userName->full_name : "";
            $accountLogModel->amount = $data->amount;
            $accountLogModel->category_id = $data->account_category_id;
            $accountLogModel->account_id = $request->input('account_id');
            $accountLogModel->account_number_id = $request->input('account_number_id');
            $accountLogModel->trx_id = $request->input('trx_id') ?? '';
            $accountLogModel->receipt_no = $data->account_receipt_no;
            $accountLogModel->is_income = 1;
            $accountLogModel->description = $data->description;
            $accountLogModel->update();
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
