<?php

use App\Modules\AccountManagement\AccountReceiptBook\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('account-receipt-books', Controller::class);
});
