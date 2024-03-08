<?php

use App\Modules\AccountManagement\AccountReceiptBookAssign\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('account-receipt-book-assigns', Controller::class);
    Route::post('get-all-select-user-assign-receipt-book/{user_id}', [Controller::class, 'get_all_select_user_assign_receipt_book']);
});
