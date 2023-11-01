<?php

use App\Modules\AccountManagement\AccountIncome\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-incomes', Controller::class);
});
