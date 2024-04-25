<?php

use App\Modules\TestModule\ModuleOne\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('module-ones', Controller::class);
    Route::post('module-ones/bulk-action', [Controller::class, 'bulkAction']);
});