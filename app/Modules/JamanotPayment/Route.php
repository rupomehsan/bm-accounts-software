<?php

use App\Modules\JamanotPayment\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('jamanot-payments', Controller::class);
    Route::post('jamanot-payments/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('jamanot-payments/search', [Controller::class, 'seachByDateWise']);
});
