<?php

use App\Modules\AccountManagement\AccountReceiptBook\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('account-receipt-books', Controller::class);
    Route::get('/latest-account-receipt-book', [Controller::class, 'latestAccountReceiptBook']);
    Route::post('/accept-receipt-book/{id}', [Controller::class, 'acceptReceiptBook']);
});
