<?php

use App\Modules\AssetManagement\AssetAuditList\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-audit-lists', Controller::class);
    Route::post('asset-audit-lists/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('asset-audits-status-update', [Controller::class, 'assetAuditUpdate']);
});
