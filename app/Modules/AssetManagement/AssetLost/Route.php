<?php

use App\Modules\AssetManagement\AssetLost\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-losts', Controller::class);
    Route::post('asset-losts/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('asset-losts/search', [Controller::class, 'seachByDateWise']);
});
