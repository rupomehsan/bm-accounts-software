<?php

namespace App\Modules\AccountManagement\AccountBranchTarget\Actions;

use Carbon\Carbon;
use PhpParser\Node\Expr\AssignOp\Mod;

class getBranchTargetByBranchId
{
    static $model = \App\Modules\AccountManagement\AccountBranchTarget\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute($userId)
    {
        try {

            $accountCategory = 1;
            if ($accountCategory && $userId) {

                $totalPayable = 0;
                $totalPaid = 0;
                $sessionData = [];
                $getSessiontData = self::$model::query()->where('branch_id', $userId)->orderBy('session', 'asc')->get();
                foreach ($getSessiontData as $item) {
                    $sessionData[] = [
                        "session" => $item->session,
                        "target_amount" => $item->target_amount
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

                    if ($accountCategory == 1) {
                        $monthCount = $startDate->diffInMonths($endDate);
                        $sessionData[$key]['total_payable'] = $sessionData[$key]['target_amount'] * $monthCount;
                        $totalPayable +=  $sessionData[$key]['total_payable'];
                    } else {
                        $totalPayable += $sessionData[$key]['target_amount'];
                    }


                    $sessionData[$key]['total_paid'] = self::$accountLogModel::where('category_id', $accountCategory)
                        ->where('user_id', $userId)
                        ->whereDate('date', '>=', $startDate->clone()->format('Y-m-d'))
                        ->whereDate('date', '<', $endDate->clone()->format('Y-m-d'))
                        ->sum('amount');


                    $totalPaid += $sessionData[$key]['total_paid'];
                }

                $data = [
                    'data' => $sessionData,
                    'totalPayable' => $totalPayable,
                    'totalPaid' => $totalPaid
                ];
                return entityResponse($data);
            } else {
                return [
                    'data' => [
                        "session" => null,
                        "target_amount" => null,
                        "total_payable" => null,
                        "total_paid" => null
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
