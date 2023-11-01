<?php

use App\Modules\QuotationProductPrice\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('quotation-product-prices', Controller::class);
});