<?php

use App\Modules\AccountManagement\AccountReceiptBook\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('account-receipt-books', Controller::class);
    Route::get('/latest-account-receipt-book', [Controller::class, 'latestAccountReceiptBook']);
    Route::post('/receipt-book-bulk-actions', [Controller::class, 'receiptBookBulkActions']);
    Route::post('/accept-receipt-book/{id}', [Controller::class, 'acceptReceiptBook']);
    Route::get('/get-receipt-book-remaining-pages/{id}', [Controller::class, 'GetReceiptbookRemainingPages']);
});
