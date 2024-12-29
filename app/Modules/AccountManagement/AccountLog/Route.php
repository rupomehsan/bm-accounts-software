<?php

use App\Modules\AccountManagement\AccountLog\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('account-logs', Controller::class);
    Route::get('get-all-income-by-category-id/{id}', [Controller::class, 'getAllIncomeByCategoryID']);
    Route::get('get-all-expense-by-category-id/{id}', [Controller::class, 'getAllExpenseByCategoryID']);
    Route::post('get-all-income-by-datewise', [Controller::class, 'getAllIncomeByDatewise']);
    Route::post('get-all-expense-by-datewise', [Controller::class, 'getAllExpenseByDatewise']);
    Route::get('get-all-income-expense-report', [Controller::class, 'IncomeExpenseReport']);
    Route::get('get-income-expense-closing-in-range', [Controller::class, 'IncomeExpenseClosingRange']);
    Route::get('get-income-ledger', [Controller::class, 'getIncomeLedger']);
    Route::get('get-all-income-total', [Controller::class, 'getIncomeTotal']);
    Route::get('get-all-expense-total', [Controller::class, 'getExpenseTotal']);
    Route::post('get-income-ledger-by-category', [Controller::class, 'getIncomeLedgerByCategory']);
    // Reporting
    Route::post('main-ledger-shit', [Controller::class, 'mainLedger']);
    Route::post('statements', [Controller::class, 'statements']);
    Route::post('fetch-income-expense-closing-in-range', [Controller::class, 'income_expense_closing_in_range']);
    Route::post('get-all-loan-register', [Controller::class, 'get_all_loan_register']);
    Route::post('get-all-jamanot-register', [Controller::class, 'get_all_jamanot_register']);
    Route::post('get-all-ekkalin-prodan', [Controller::class, 'get_all_ekkalin_prodan']);
    Route::post('get-all-niyomito_prodan', [Controller::class, 'get_all_niyomito_prodan']);
    Route::post('get-all-kendriosuvakanghi-income', [Controller::class, 'get_all_kendriosuvakanghi_income']);
    Route::post('get-all-office-rent', [Controller::class, 'get_all_office_rent']);
    Route::post('get-all-house-rent', [Controller::class, 'get_all_house_rent']);
});
