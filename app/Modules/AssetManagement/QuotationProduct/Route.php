<?php

use App\Modules\QuotationProduct\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('quotation-products', Controller::class);
});