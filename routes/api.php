<?php

use App\Http\Controllers\app\OrderController;
use App\Http\Controllers\app\OrderDetailController;
use App\Http\Controllers\app\EmployeeController;
use App\Http\Controllers\app\OfficeController;
use App\Http\Controllers\app\ProductController;
use App\Http\Controllers\app\ProductLineController;
use App\Http\Controllers\app\PaymentController;
use App\Http\Controllers\app\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * TODO
 * 
 * Access token middleware
 * Customer login
 * Employee login
 * 
 * Customer only view their orders
 * Employee only view/edit thier customers, and orders
 * Supervisors view/edit all
 */


Route::group(['middleware' => ['access.auth']], function() {

    // Product Lines
    Route::get('/product-lines', [ProductLineController::class, 'index']);
    Route::get('/product-lines/{id}', [ProductLineController::class, 'show']);
    // store - post
    // update - patch
    // destroy - delete

    // Products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);

    // Offices
    Route::get('/offices', [OfficeController::class, 'index']);
    Route::get('/offices/{id}', [OfficeController::class, 'show']);

    // Employees
    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::get('/employees/{id}', [EmployeeController::class, 'show']);

    // Payments
    Route::get('/payments', [PaymentController::class, 'index']);
    Route::get('/payments/{id}', [PaymentController::class, 'show']);

    // Orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);

    // Order Details
    Route::get('/order-details', [OrderDetailController::class, 'index']);
    Route::get('/order-details/{id}', [OrderDetailController::class, 'show']);

    // Customers
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/{id}', [CustomerController::class, 'show']);
    
});

