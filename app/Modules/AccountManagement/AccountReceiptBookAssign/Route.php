<?php

use App\Modules\AccountManagement\AccountReceiptBookAssign\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-receipt-book-assigns', Controller::class);
});
