<?php

namespace App\Modules\AccountManagement\AccountBranchTarget\Actions;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Mod;

class getBranchTargetByBranchId
{
    static $model = \App\Modules\AccountManagement\AccountBranchTarget\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $applicationModel = \App\Modules\CpApplication\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());

            $accountCategory = request()->input('account_category_id');

            if ($accountCategory && request()->input('branch_id')) {
                $totalPayable = 0;
                $totalPaid = 0;
                $sessionData = [];
                $getSessiontData = self::$model::query()->where('account_category_id', request()->input('account_category_id'))->where('branch_id', request()->input('branch_id'))->orderBy('session', 'asc')->get();

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
                        ->where('user_id', request()->input('branch_id'))
                        ->whereDate('date', '>=', $startDate->clone()->format('Y-m-d'))
                        ->whereDate('date', '<', $endDate->clone()->format('Y-m-d'))
                        ->sum('amount');
                    $totalPaid += $sessionData[$key]['total_paid'];
                }

                $application = self::$applicationModel::where('income_category_id', $accountCategory)
                    ->where('applicant_id', request()->input('branch_id'))
                    ->where('is_approve', 1)
                    ->get()
                    ??
                    [];

                $data = [
                    'data' => $sessionData,
                    'totalPayable' => $totalPayable,
                    'totalPaid' => $totalPaid,
                    'due' => abs($totalPayable - $totalPaid),
                    'application' => $application
                ];

                return entityResponse($data);
            } else {
                return [
                    'data' => [
                        "session" => null,
                        "target_amount" => null,
                        "total_payable" => null,
                        "total_paid" => null,
                        "due" => null
                    ],
                    'totalPayable' => 0,
                    'totalPaid' => 0
                ];
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
