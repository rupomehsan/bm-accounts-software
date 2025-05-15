<?php

use App\Modules\AccountManagement\AccountGroup\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-groups', Controller::class);
    Route::post('account-groups/bulk-action', [Controller::class, 'bulkAction']);
});