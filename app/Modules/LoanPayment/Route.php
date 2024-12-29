<?php

use App\Modules\LoanPayment\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('loan-payments', Controller::class);
    Route::post('loan-payments/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('loan-payments/search', [Controller::class, 'seachByDateWise']);
});
