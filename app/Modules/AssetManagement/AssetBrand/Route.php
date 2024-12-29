<?php

use App\Modules\AssetManagement\AssetBrand\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-brands', Controller::class);
    Route::post('asset-brands/bulk-action', [Controller::class, 'bulkAction']);
});