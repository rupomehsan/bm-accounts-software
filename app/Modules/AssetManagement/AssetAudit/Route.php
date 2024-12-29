<?php

use App\Modules\AssetManagement\AssetAudit\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-audits', Controller::class);
    Route::post('asset-audits/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('asset-audits/search', [Controller::class, 'seachByDateWise']);
});
