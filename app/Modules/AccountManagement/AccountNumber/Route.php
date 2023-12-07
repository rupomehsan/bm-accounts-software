<?php

use App\Modules\AccountManagement\AccountNumber\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-numbers', Controller::class);
});
