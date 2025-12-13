<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductControllerAPI;
use App\Http\Controllers\Api\UserControllerAPI;
use App\Http\Controllers\Api\SaleControllerAPI;

Route::apiResource('products', ProductControllerAPI::class);
Route::apiResource('users', UserControllerAPI::class);
Route::apiResource('sales', SaleControllerAPI::class);
