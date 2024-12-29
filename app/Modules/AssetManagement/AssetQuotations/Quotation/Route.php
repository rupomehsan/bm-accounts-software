<?php

use App\Modules\AssetManagement\AssetQuotations\Quotation\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('quotations', Controller::class);
    Route::post('quotations/bulk-action', [Controller::class, 'bulkAction']);
    Route::get('asset-quotation-detatils/{id}', [Controller::class, 'assetQuotationDetatilsByCpRequestId']);
});
