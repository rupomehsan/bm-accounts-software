<?php

use App\Modules\AssetManagement\AssetItem\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-items', Controller::class);
});
