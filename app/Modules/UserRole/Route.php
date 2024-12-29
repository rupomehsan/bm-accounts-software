<?php

use App\Modules\UserRole\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('user-roles', Controller::class);
});