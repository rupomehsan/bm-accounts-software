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
    static $brancTargetModel = \App\Modules\AccountManagement\AccountBranchTarget\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $accountCategory = \App\Modules\AccountManagement\AccountCategory\Model::class;
    public static function execute()
    {
        try {
            // dd(request()->all());

            $monthlyDue = self::getMonthlyDue();
            $monthlyIncome = self::getCurrentMonthIncome();

            $data = [
                "totalIncome" => self::$log::where('is_income', 1)->sum('amount'),
                "totalExpense" => self::$log::where('is_expense', 1)->sum('amount'),
                "monthlyDue" => $monthlyDue['due'] ?? 0,
                "monthlyIncome" => $monthlyIncome,
                "monthlyExpense" => self::$log::where('is_expense', 1)->whereMonth('created_at', '=', Carbon::now()->month)->sum('amount'),
                "totalReceiptBooks" => self::$receiptBookModel::where('is_approvel', 0)->count(),
                "totalUsers" => self::$userModel::count(),
                "totalVouchers" => self::$voucherModel::count(),
                "totalCategory" => self::$categoryModel::count(),
                "totalBookAssign" => self::$assignBookModel::count(),
                "totalApplication" => self::$applicationModel::where('is_approve',0)->count(),
                "loanProvide" => self::$loanProvideModel::sum('amount'),
                "loanPayment" => self::$loanPaymentModel::sum('amount'),
            ];
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }

    public static function getMonthlyDue($brancId = null, $categoryId = null)
    {
        $totalPayable = 0;
        $totalPaid = 0;
        $sessionData = [];

        $Category = self::$accountCategory::where('title', 'মাসিক আয়')->first();
        $accountCategory = $Category->id;

        $getSessiontData = self::$brancTargetModel::query()
            ->where('account_category_id', $accountCategory)
            ->orderBy('session', 'asc');


        if ($brancId) {
            $getSessiontData->where('branch_id', request()->input('branch_id'));
        }

        $getSessiontData = $getSessiontData->get();



        foreach ($getSessiontData as $item) {
            $sessionData[] = [
                "session" => $item->session,
                "target_amount" => $item->target_amount,
                "payment_interval" => $item->payment_interval
            ];
        }



        foreach ($sessionData as $key  => $item) {
            $startDate = Carbon::parse($sessionData[$key]['session']);
            $endDate = null;
            if (isset($sessionData[$key + 1])) {
                $endDate = Carbon::parse($sessionData[$key + 1]['session']);
            } else {
                $endDate = Carbon::now();
            }
            // if ($accountCategory == 1) {
            $monthCount = $startDate->diffInMonths($endDate);
            $count = 0;

            if ($item['payment_interval'] == 'monthly') {
                $count = $monthCount;
            }

            if ($item['payment_interval'] == 'three_month') {
                $count = ceil($monthCount / 3);
            }

            if ($item['payment_interval'] == 'six_month') {
                $count = ceil($monthCount / 6);
            }

            if ($item['payment_interval'] == 'yearly') {
                $count = ceil($monthCount / 12);
            }
            if ($item['payment_interval'] == 'one_time') {
                $count = 1;
            }
            $sessionData[$key]['total_payable'] = $sessionData[$key]['target_amount'] *  $count;
            $totalPayable +=  $sessionData[$key]['total_payable'];
            // } else {
            //     $totalPayable += $sessionData[$key]['target_amount'];
            // }


            $sessionData[$key]['total_paid'] = self::$accountLogModel::where('category_id', $accountCategory)
                ->whereDate('date', '>=', $startDate->clone()->format('Y-m-d'))
                ->whereDate('date', '<', $endDate->clone()->format('Y-m-d'));



            if ($brancId) {
                $sessionData[$key]['total_paid'] = $sessionData[$key]['total_paid']->where('user_id', $brancId);
            }

            $sessionData[$key]['total_paid'] = $sessionData[$key]['total_paid']->sum('amount') ?? 0;


            $totalPaid += $sessionData[$key]['total_paid'];
        }


        $data = [
            'due' => abs($totalPayable - $totalPaid),
        ];

        return $data;
    }
    public static function getCurrentMonthIncome()
    {

        $income = self::$accountLogModel::where('is_income', 1)->whereMonth('date', Carbon::now()->month)->sum('amount');
        return $income;
    }
}
