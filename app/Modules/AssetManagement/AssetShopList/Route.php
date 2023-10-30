<?php

use App\Modules\AssetShopList\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('asset-shop-lists', Controller::class);
});