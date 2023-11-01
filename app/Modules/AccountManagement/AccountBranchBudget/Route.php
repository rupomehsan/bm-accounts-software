<?php

use App\Modules\AccountManagement\AccountBranchBudget\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-branch-budgets', Controller::class);
});
