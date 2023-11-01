<?php

use App\Modules\AssetManagement\AssetQuotation\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-quotations', Controller::class);
});
