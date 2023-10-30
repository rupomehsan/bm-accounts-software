<?php

use App\Modules\AssetChangeHistory\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-change-histories', Controller::class);
});