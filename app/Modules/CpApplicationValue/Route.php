<?php

use App\Modules\CpApplicationValue\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('cp-application-values', Controller::class);
});