<?php

use App\Modules\AssetManagement\Asset\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('assets', Controller::class);
    Route::post('assets/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('assets/bulk-action', [Controller::class, 'bulkAction']);
    Route::get('assets/details/{id}', [Controller::class, 'showDetails']);
});
