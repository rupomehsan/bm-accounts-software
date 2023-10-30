<?php

use App\Modules\AssetManagement\Asset\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('assets', Controller::class);
});
