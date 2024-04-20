<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\ReturnRentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('cars', CarsController::class);
    Route::resource('rents', RentController::class);
    Route::resource('return-rents', ReturnRentController::class);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login_process'])->name('auth.login.process');
    // Route::get('register', [AuthController::class, 'register'])->name('register');
    // Route::post('register', [AuthController::class, 'register_process'])->name('auth.register.process');
});


Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
