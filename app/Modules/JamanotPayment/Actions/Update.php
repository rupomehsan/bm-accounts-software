<?php

namespace App\Modules\JamanotPayment\Actions;

use App\Modules\JamanotPayment\Actions\Validation;

class Update
{
    static $model = \App\Modules\JamanotPayment\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $loanRegisterModel = \App\Modules\LoanProvider\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

            $requestdata = $request->validated();

            $loanRegister = self::$loanRegisterModel::find($requestdata['jamanot_provide_id']);

            if ($data['amount'] < $loanRegister->amount) {
                $data['due'] = $loanRegister->amount - $data['amount'];
                $data['payment_status'] = 'due';
                $loanRegister->payment_status = 'due';
            }

            if ($data['amount'] >= $loanRegister->amount) {
                $data['due'] = $loanRegister->amount - $data['amount'];
                $data['payment_status'] = 'paid';
                $loanRegister->payment_status = 'paid';
            }
            $requestdata['category_id'] = $loanRegister->category_id;
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
                    'category_id' => $loanRegister->category_id,
                ];
                $accLog->update($logData);
                $loanRegister->update();
                $data->update();
                return messageResponse('Item updated successfully');
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
