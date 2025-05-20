<?php

namespace App\Modules\AccountManagement\AccountLog\Actions;

use App\Modules\AccountManagement\AccountLog\Actions\Validation;


class Store
{
    static $model = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute($data)
    {
        try {
            // dd($data);
            $accountLogModel = self::$model::create([
                "user_id" => $data['user_id'],
                "user_type" => $data['user_type'],
                "date" => $data['date'],
                "name" => $data['name'],
                "amount" => $data['amount'],
                "category_id" => $data['category_id'],
                "account_id" => $data['account_id'],
                "account_number_id" => $data['account_number_id'],
                "trx_id" => $data['trx_id'],
                "receipt_no" => $data['receipt_no'],
                "is_income" => $data['is_income'],
                "is_expense" => $data['is_expense'],
                "description" => $data['description'],
                "random_user" => $data['random_user'],
            ]);


            return $accountLogModel;
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
