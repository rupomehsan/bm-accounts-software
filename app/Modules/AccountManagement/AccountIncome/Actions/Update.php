<?php

namespace App\Modules\AccountManagement\AccountIncome\Actions;

use App\Modules\AccountManagement\AccountIncome\Actions\Validation;
use Carbon\Carbon;

class Update
{
    static $incomeModel = \App\Modules\AccountManagement\AccountIncome\Model::class;
    static $expenseModel = \App\Modules\AccountManagement\AccountExpense\Model::class;
    static $accountCategoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            $income = self::$incomeModel::with('account_logs')->find($id);
            $categoryId = self::$accountCategoryModel::where('title', 'আয় সমন্নয়')->value('id');
            $expenseData = [
                "approved" => 0,
                "amount" => $request->amount,
                "account_expense_category_id" => $categoryId,
                "date" => Carbon::now(),
            ];
            if (self::$expenseModel::create($expenseData)) {
                // dd(auth()->user());
                $logData = [
                    "user_id" => $income->branch_id ?? $income->central_division_id,
                    "user_type" => $income->branch_id ? "branch" : "central_division",
                    "date" => Carbon::now(),
                    "name" => auth()->user()->full_name ?? "",
                    "random_user" =>  "",
                    "amount" => $request->amount,
                    "category_id" => $categoryId,
                    "account_id" => $income->account_logs->account_id,
                    "account_number_id" => $income->account_logs->account_number_id,
                    "is_income" => 0,
                    "is_expense" => 1,
                    "description" => $request->description,
                ];
                logEntry($logData);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
