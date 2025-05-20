<?php

use App\Modules\WebsiteSetting\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('get-dashboard-analytics', [Controller::class, 'getDashboardAnalytics']);
});
