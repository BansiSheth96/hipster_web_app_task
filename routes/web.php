<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CustomerAuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Admin routes
Route::prefix('admin')->group(function () {

    //Login
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.admin_login');
    Route::post('login', [AdminAuthController::class, 'login']);
    
    //Register
    Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.admin_register');
    Route::post('register', [AdminAuthController::class, 'register']);

    //Dashboard
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminAuthController::class, 'showDashboard'])->name('admin.admin_dashboard');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
});

// Customer routes
Route::prefix('customer')->group(function () {

    //Login
    Route::get('login', [CustomerAuthController::class, 'showCustomerLoginForm'])->name('customer.customer_login');
    Route::post('login', [CustomerAuthController::class, 'customerLogin']);
    
    //Register
    Route::get('register', [CustomerAuthController::class, 'showCustomerRegisterForm'])->name('customer.customer_register');
    Route::post('register', [CustomerAuthController::class, 'customerRegister']);

    //Dashboard
    Route::middleware('auth:customer')->group(function () {
        Route::get('dashboard', [CustomerAuthController::class, 'showCustomerDashboard'])->name('customer.customer_dashboard');
        Route::post('logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
    });
});