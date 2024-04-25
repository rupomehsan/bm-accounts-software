<?php

namespace App\Modules\AccountManagement\AccountIncome\Actions;

use App\Models\TargetMoukuf;
use App\Modules\AccountManagement\AccountIncome\Actions\Validation;
use App\Modules\AccountManagement\AccountLog\Actions\Store as LogStore;


class Store
{
    static $model = \App\Modules\AccountManagement\AccountIncome\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $userModel = \App\Modules\User\Model::class;
    static $applicationModel = \App\Modules\CpApplication\Model::class;

    public static function execute(Validation $request)
    {
        try {

            if ($income = self::$model::query()->create($request->validated())) {
                $userName = null;
                if ($request->input('branch_id')) {
                    $userName = self::$userModel::with('roles')->where('id', $request->input('branch_id'))->first();
                } else if ($request->input('central_division_id')) {
                    $userName = self::$userModel::with('roles')->where('id', $request->input('central_division_id'))->first();
                }

                $data = [
                    "user_id" => $request->input('branch_id'),
                    "user_type" => $userName ? $userName->roles[0]->name : '',
                    "date" => $income->date,
                    "name" => $userName->full_name ?? "",
                    "amount" => $income->amount,
                    "category_id" => $income->account_category_id,
                    "account_id" => $request->input('account_id'),
                    "account_number_id" => $request->input('account_number_id'),
                    "trx_id" => $request->input('trx_id') ?? '',
                    "receipt_no" => $income->account_receipt_no,
                    "is_income" => 1,
                    "is_expense" => 0,
                    "description" => $income->description,
                    "random_user" => $request->input('random_user'),
                ];

                $accountLogModel = LogStore::execute($data);
                $income->account_log_id =  $accountLogModel->id;
                $income->update();

                if ($request->input('application_id') && $request->input('application_id') != "null") {
                    $targetMoukuf = new TargetMoukuf();
                    $moulufAmount = self::$applicationModel::find($request->input('application_id'));
                    $targetMoukuf->account_category_id = $income->account_category_id;
                    $targetMoukuf->application_id = $request->input('application_id');
                    $targetMoukuf->user_id = $request->input('user_id');
                    $targetMoukuf->amount = $moulufAmount->moukuf_amount;
                    $targetMoukuf->account_income_id = $income->id;
                    $targetMoukuf->account_log_id = $accountLogModel->id;
                    $targetMoukuf->save();
                }
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
