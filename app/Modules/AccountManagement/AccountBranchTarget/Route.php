<?php

use App\Modules\AccountManagement\AccountBranchTarget\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-branch-targets', Controller::class);
    Route::get('get-account-branch-target-branch-id', [Controller::class, 'getBranchTargetByBranchId']);
});
