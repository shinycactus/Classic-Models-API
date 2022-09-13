<?php

use App\Http\Controllers\ProductLineController;
use App\Models\ProductLine;
use Illuminate\Http\Request;
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

// Product Lines
Route::get('/product-lines', [ProductLineController::class, 'index']);
Route::get('/product-lines/{productLine}', [ProductLineController::class, 'show']);
