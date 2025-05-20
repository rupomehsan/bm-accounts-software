<?php

use App\Modules\AppSetting\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('app-settings', Controller::class);
});