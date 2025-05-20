<?php

use App\Modules\JamanotProvider\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('jamanot-providers', Controller::class);
    Route::post('jamanot-providers/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('jamanot-providers/search', [Controller::class, 'seachByDateWise']);
});
