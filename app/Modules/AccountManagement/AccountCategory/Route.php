<?php

use App\Modules\AccountManagement\AccountCategory\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-categories', Controller::class);
});
