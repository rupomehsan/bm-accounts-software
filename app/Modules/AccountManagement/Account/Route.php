<?php

use App\Modules\AccountManagement\Account\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('accounts', Controller::class);
    Route::get('/accounts-info', function () {
        return getAccountsInfo();
    });
});
