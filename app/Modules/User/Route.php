<?php

use App\Modules\User\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('users', Controller::class);
    Route::get('department-at-a-glance', [Controller::class, 'departmentAtAglance']);
    Route::post('user-unblock/{id}', [Controller::class, 'userUnblock']);
});


Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::get('check_user', [Controller::class, 'checkUser']);
    Route::post('update-password', [Controller::class, 'updatePassword']);
});
