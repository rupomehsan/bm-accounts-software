<?php

use App\Modules\AccountManagement\AccountIncomeExtrafield\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-income-extrafields', Controller::class);
});
