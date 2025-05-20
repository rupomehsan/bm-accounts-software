<?php

use App\Modules\HouseRent\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('house-rents', Controller::class);
    Route::post('house-rents/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('house-rents/search', [Controller::class, 'seachByDateWise']);
});
