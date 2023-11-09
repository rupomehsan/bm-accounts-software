<?php

use App\Modules\User\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('users', Controller::class);
});


Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::get('check_user', [Controller::class, 'checkUser']);
});
