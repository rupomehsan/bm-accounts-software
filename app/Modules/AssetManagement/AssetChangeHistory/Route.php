<?php

use App\Modules\AssetManagement\AssetChangeHistory\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-change-histories', Controller::class);
    Route::post('asset-change-histories/bulk-action', [Controller::class, 'bulkAction']);
});