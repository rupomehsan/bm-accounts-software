<?php

use App\Modules\AssetManagement\AssetShopList\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-shop-lists', Controller::class);
    Route::post('asset-shop-lists/bulk-action', [Controller::class, 'bulkAction']);
});