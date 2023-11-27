<?php

use App\Modules\AccountManagement\AccountLog\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-logs', Controller::class);
    Route::get('get-all-income-by-category-id/{id}', [Controller::class, 'getAllIncomeByCategoryID']);
    Route::post('get-all-income-by-datewise', [Controller::class, 'getAllIncomeByDatewise']);
    Route::get('get-all-income-expense-report', [Controller::class, 'IncomeExpenseReport']);
    Route::get('get-income-expense-closing-in-range', [Controller::class, 'IncomeExpenseClosingRange']);
    Route::get('get-income-ledger', [Controller::class, 'getIncomeLedger']);
});
