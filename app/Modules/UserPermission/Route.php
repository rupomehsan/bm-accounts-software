<?php

use App\Modules\UserPermission\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('user-permissions', Controller::class);
});