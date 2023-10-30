<?php

use App\Modules\AssetManagement\AssetAudit\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-audits', Controller::class);
});
