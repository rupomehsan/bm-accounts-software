<?php

function getAccountsInfo()
{
    $accountModle = \App\Modules\AccountManagement\Account\Model::class;
    $accountInfo = $accountModle::with(['account_number' => function ($q) {
        $q->withSum('account_logs', 'amount');
    }])
        ->withSum('account_logs', 'amount')
        ->get();

    return $accountInfo;
}
