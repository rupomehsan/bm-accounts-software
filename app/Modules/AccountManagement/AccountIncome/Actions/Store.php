<?php

namespace App\Modules\AccountManagement\AccountIncome\Actions;

use App\Modules\AccountManagement\AccountIncome\Actions\Validation;


class Store
{
    static $model = \App\Modules\AccountManagement\AccountIncome\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $userModel = \App\Modules\User\Model::class;

    public static function execute(Validation $request)
    {
        try {
            // dd($request->all());
            if ($income = self::$model::query()->create($request->validated())) {
                $userName = self::$userModel::find($income->branch_id);
                $accountLogModel = new self::$accountLogModel();
                $accountLogModel->user_id = $income->branch_id;
                $accountLogModel->user_type = "branch";
                $accountLogModel->date = $income->date;
                $accountLogModel->name = $userName->full_name ?? "";
                $accountLogModel->amount = $income->amount;
                $accountLogModel->category_id = $income->account_category_id;
                $accountLogModel->account_id = $request->input('account_id');
                $accountLogModel->account_number_id = $request->input('account_number_id');
                $accountLogModel->trx_id = $request->input('trx_id') ?? '';
                $accountLogModel->receipt_no = $income->account_receipt_no;
                $accountLogModel->is_income = 1;
                $accountLogModel->description = $income->description;
                $accountLogModel->save();
                $income->account_log_id = $accountLogModel->id;
                $income->update();
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
