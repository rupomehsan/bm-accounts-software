<?php

use App\Modules\AssetManagement\AssetTransfer\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('asset-transfers', Controller::class);
    Route::post('asset-transfers/bulk-action', [Controller::class, 'bulkAction']);
});
