<?php

use App\Modules\LoanProvider\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('loan-providers', Controller::class);
    Route::post('loan-providers/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('loan-providers/search', [Controller::class, 'seachByDateWise']);
});
