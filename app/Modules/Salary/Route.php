<?php

use App\Modules\Salary\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('salaries', Controller::class);
    Route::post('salaries/bulk-action', [Controller::class, 'bulkAction']);
    Route::post('salaries/search', [Controller::class, 'seachByDateWise']);

});
