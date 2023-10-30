<?php

use App\Modules\AssetLost\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-losts', Controller::class);
});