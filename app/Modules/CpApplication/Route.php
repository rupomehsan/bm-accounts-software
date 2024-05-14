<?php

use App\Modules\CpApplication\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('cp-applications', Controller::class);
    Route::post('cp-application-approval', [Controller::class, 'applicationApproval']);
    Route::post('cp-application-approval/search', [Controller::class, 'seachByDateWise']);
});
