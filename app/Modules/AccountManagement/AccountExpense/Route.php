<?php

use App\Modules\AccountManagement\AccountExpense\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('account-expenses', Controller::class);
    Route::post('account-expenses/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('account-expenses/search', [Controller::class, 'seachByDateWise']);
    Route::delete('delete-support-account-expense/{id}', [Controller::class, 'deleteSupportVoucher']);
    Route::get('approval-voucher', [Controller::class, 'approvalVoucher']);
    Route::get('bm-not-approval-voucher', [Controller::class, 'bmNotApprovalVoucher']);
    Route::get('cp-not-approval-voucher', [Controller::class, 'CpNotApprovalVoucher']);
    Route::get('not-approved-by-support-bm-vouchers', [Controller::class, 'notApprovedBySupportBmVoucher']);
    Route::post('support-voucher-approval-by-admin', [Controller::class, 'supportVoucherApprovalByAdmin']);
    Route::post('voucher-cancel-comment', [Controller::class, 'voucherCancelComment']);
    Route::get('get-single-supoort-voucher/{id}', [Controller::class, 'getSingleSupportVoucher']);
    Route::get('get-single-voucher-with-top-shit/{id}', [Controller::class, 'getSingleVoucherWithTopShit']);
    Route::post('set-month-for-voucher', [Controller::class, 'SetMonth']);
    Route::get('get-active-month-for-voucher', [Controller::class, 'getActiveMonth']);

});
