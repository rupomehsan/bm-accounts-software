<?php

use App\Modules\UserNotification\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('user-notifications', Controller::class);
});
