<?php

use App\Modules\AssetWaranty\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-waranties', Controller::class);
});