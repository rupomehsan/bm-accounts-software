<?php

use App\Modules\AssetManagement\AssetCategory\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-categories', Controller::class);
    Route::post('asset-categories/bulk-action', [Controller::class, 'bulkAction']);
});