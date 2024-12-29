<?php

use App\Modules\SohidFamily\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('sohid-families', Controller::class);
});