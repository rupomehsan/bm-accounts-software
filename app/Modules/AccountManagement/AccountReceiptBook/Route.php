<?php

use App\Modules\AccountManagement\AccountReceiptBook\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-receipt-books', Controller::class);
});
