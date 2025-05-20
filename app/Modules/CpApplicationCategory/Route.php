<?php

use App\Modules\CpApplicationCategory\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('cp-application-categories', Controller::class);
});