<?php

use App\Modules\CpApplicationFormat\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('cp-application-formats', Controller::class);
});