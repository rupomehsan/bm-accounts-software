<?php

use App\Modules\AccountLog\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-logs', Controller::class);
});