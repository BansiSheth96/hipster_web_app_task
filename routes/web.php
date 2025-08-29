<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CustomerAuthController;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Admin_OrderController;

use App\Http\Controllers\Customer\CProductController;
use App\Http\Controllers\Customer\OrderController;


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

    Route::middleware('admin.auth')->group(function () {
        //Dashboard
        Route::get('dashboard', [AdminAuthController::class, 'showDashboard'])->name('admin.admin_dashboard');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        //Orders
        Route::get('orders', [Admin_OrderController::class, 'index'])->name('admin.orders.index');
        Route::post('orders/{order}/update-status', [Admin_OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');

    });

    Route::middleware('admin.auth')->name('admin.')->group(function () {
        //Product
        Route::resource('products', ProductController::class);
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

    Route::middleware('customer.auth')->group(function () {
        //Dashboard
        Route::get('dashboard', [CustomerAuthController::class, 'showCustomerDashboard'])->name('customer.customer_dashboard');
        Route::post('logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
    });
});

Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('products', [CProductController::class, 'index'])->name('products.index');
});

Route::prefix('customer')->middleware('customer.auth')->name('customer.')->group(function() {
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/create/{productId}', [OrderController::class, 'create'])->name('orders.create');
    Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
});