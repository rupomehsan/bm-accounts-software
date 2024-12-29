<?php

use App\Modules\OfficeRent\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('office-rents', Controller::class);
    Route::post('office-rents/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('office-rents/search', [Controller::class, 'seachByDateWise']);

});
