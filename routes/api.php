<?php

use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\app\OrderController as AppOrderController;
use App\Http\Controllers\app\OrderDetailController as AppOrderDetailController;
use App\Http\Controllers\Admin\OrderDetailController as AdminOrderDetailController;
use App\Http\Controllers\app\EmployeeController as AppEmployeeController;
use App\Http\Controllers\Admin\EmployeeController as AdminEmployeeController;
use App\Http\Controllers\app\OfficeController as AppOfficeController;
use App\Http\Controllers\Admin\OfficeController as AdminOfficeController;
use App\Http\Controllers\app\ProductController as AppProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\app\ProductLineController as AppProductLineController;
use App\Http\Controllers\Admin\ProductLineController as AdminProductLineController;
use App\Http\Controllers\app\PaymentController as AppPaymentController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\app\CustomerController as AppCustomerController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Api\AuthController;
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
    Route::post('/auth/register', [AuthController::class, 'createEmployee']);
    Route::post('/auth/login', [AuthController::class, 'loginEmployee']);
});


Route::group(['middleware' => ['access.auth', 'auth:sanctum']], function() {

    // Product Lines
    Route::get('/app/product-lines', [AppProductLineController::class, 'index']);
    Route::get('/app/product-lines/{id}', [AppProductLineController::class, 'show']);

    // Products
    Route::get('/app/products', [AppProductController::class, 'index']);
    Route::get('/app/products/{id}', [AppProductController::class, 'show']);

    // Offices
    Route::get('/app/offices', [AppOfficeController::class, 'index']);
    Route::get('/app/offices/{id}', [AppOfficeController::class, 'show']);

    // Employees
    Route::get('/app/employees', [AppEmployeeController::class, 'index']);
    Route::get('/app/employees/{id}', [AppEmployeeController::class, 'show']);

    // Payments
    Route::get('/app/payments', [AppPaymentController::class, 'index']);
    Route::get('/app/payments/{id}', [AppPaymentController::class, 'show']);

    // Orders
    Route::get('/app/orders', [AppOrderController::class, 'index']);
    Route::get('/app/orders/{id}', [AppOrderController::class, 'show']);

    // Order Details
    Route::get('/app/order-details', [AppOrderDetailController::class, 'index']);
    Route::get('/app/order-details/{id}', [AppOrderDetailController::class, 'show']);

    // Customers
    Route::get('/app/customers/{id}', [AppCustomerController::class, 'show']);
});

// ToDo: Admin Auth
Route::group(['middleware' => ['access.auth', 'auth:sanctum']], function() {

    // Product Lines
    Route::get('/admin/product-lines', [AdminProductLineController::class, 'index']);
    Route::get('/admin/product-lines/{id}', [AdminProductLineController::class, 'show']);
    // store - post
    // update - patch
    // destroy - delete

    // Products
    Route::get('/admin/products', [AdminProductController::class, 'index']);
    Route::get('/admin/products/{id}', [AdminProductController::class, 'show']);

    // Employees
    Route::get('/admin/employees', [AdminEmployeeController::class, 'index']);
    Route::get('/admin/employees/{id}', [AdminEmployeeController::class, 'show']);

    // Customers
    Route::get('/admin/customers', [AdminCustomerController::class, 'index']);
    Route::get('/admin/customers/{id}', [AdminCustomerController::class, 'show']);

    // Offices
    Route::get('/admin/offices', [AdminOfficeController::class, 'index']);
    Route::get('/admin/offices/{id}', [AdminOfficeController::class, 'show']);

    // Orders
    Route::get('/admin/orders', [AdminOrderController::class, 'index']);
    Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show']);

    // Order Details
    Route::get('/admin/order-details', [AdminOrderDetailController::class, 'index']);
    Route::get('/admin/order-details/{id}', [AdminOrderDetailController::class, 'show']);

    // Payments
    Route::get('/admin/payments', [AdminPaymentController::class, 'index']);
    Route::get('/admin/payments/{id}', [AdminPaymentController::class, 'show']);
});
