<?php

use App\Modules\AccountManagement\AccountReceiptBookRejectPage\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-receipt-book-reject-pages', Controller::class);
    Route::post('account-receipt-book-reject-pages/bulk-action', [Controller::class, 'bulkAction']);
});