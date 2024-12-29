<?php

use App\Modules\AssetManagement\AssetRequestToCp\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('asset-request-to-cps', Controller::class);
    Route::post('asset-request-to-cps/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('asset-quotation-approval', [Controller::class, 'assetQuotationApproval']);
    Route::post('asset-request-to-cps/search', [Controller::class, 'seachByDateWise']);
});
