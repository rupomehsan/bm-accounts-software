<?php

namespace App\Modules\LoanPayment\Actions;

use App\Modules\LoanPayment\Actions\Validation;

class Update
{
    static $model = \App\Modules\LoanPayment\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $loanRegisterModel = \App\Modules\LoanProvider\Model::class;
    static $userModel = \App\Modules\User\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

            $requestdata = $request->validated();
            $loanRegister = self::$loanRegisterModel::where('user_id', $data['user_id'])->where('id', $requestdata['loan_provide_id'])->first();

            if ($request->hasFile('attachment')) {
                $image = $request->file('attachment');
                $imageName = uploader($image, 'uploads/loan');
                $requestdata['attachment'] = $imageName;
            }

            if ($data->update($requestdata)) {
                $totalGiven = self::$model::where('user_id', $data['user_id'])
                    ->where('loan_provide_id', $data->loan_provide_id)
                    ->sum('amount');
                $data->due = $loanRegister->due_amount =  $loanRegister->amount - $totalGiven;
                $accLog = self::$accountLogModel::find($data->account_log_id);
                $Log = [
                    "amount" => $request->amount,
                    'account_id' => $request->account_id,
                    'account_number_id' => $request->account_number_id,
                ];

                $accLog->update($Log);
                $loanRegister->update();
                $data->update();
                return messageResponse('Item updated successfully');
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
