<?php

use App\Modules\AssetManagement\AssetQuotations\ProductPrice\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('product-prices', Controller::class);
    Route::post('product-prices/bulk-action', [Controller::class, 'bulkAction']);
});