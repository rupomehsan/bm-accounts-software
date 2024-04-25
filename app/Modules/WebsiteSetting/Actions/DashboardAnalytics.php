<?php

namespace App\Modules\WebsiteSetting\Actions;

use Carbon\Carbon;

class DashboardAnalytics
{
    static $log = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $receiptBookModel = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;
    static $userModel = \App\Modules\User\Model::class;
    static $voucherModel = \App\Modules\AccountManagement\AccountExpense\Model::class;
    static $categoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;
    static $assignBookModel = \App\Modules\AccountManagement\AccountReceiptBookAssign\Model::class;
    static $applicationModel = \App\Modules\CpApplication\Model::class;
    static $loanPaymentModel = \App\Modules\LoanPayment\Model::class;
    static $loanProvideModel = \App\Modules\LoanProvider\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $data = [
                "totalIncome" => self::$log::where('is_income', 1)->sum('amount'),
                "monthlyIncome" => self::$log::where('is_income', 1)->whereMonth('created_at', '=', Carbon::now()->month)->sum('amount'),
                "totalExpense" => self::$log::where('is_expense', 1)->sum('amount'),
                "monthlyExpense" => self::$log::where('is_expense', 1)->whereMonth('created_at', '=', Carbon::now()->month)->sum('amount'),
                "totalReceiptBooks" => self::$receiptBookModel::count(),
                "totalUsers" => self::$userModel::count(),
                "totalVouchers" => self::$voucherModel::count(),
                "totalCategory" => self::$categoryModel::count(),
                "totalBookAssign" => self::$assignBookModel::count(),
                "totalApplication" => self::$applicationModel::count(),
                "loanProvide" => self::$loanProvideModel::sum('amount'),
                "loanPayment" => self::$loanPaymentModel::sum('amount'),
            ];
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
