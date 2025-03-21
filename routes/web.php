<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController; //ruta
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// todo lo que esta dentro de este gruó esta protegido por la autentificación tiene que estar autentificado para poder acceder a estas rutas:
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /* Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); */


    route::resources([
        'users' => UserController::class
        /* 'products' => ProductController::class */
    ]);

    route::resources([
        'products' => ProductController::class
    ]);

    route::resources([
        'sales' => SaleController::class
    ]);
});

Route::post('users/search', [UserController::class, 'search']);
Route::post('products/search', [ProductController::class, 'search']);
Route::post('sales/search', [SaleController::class, 'search']);


require __DIR__ . '/auth.php';
