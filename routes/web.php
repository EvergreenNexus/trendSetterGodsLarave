<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index']);
Route::get('/men', [ProductController::class, 'menShoes']);
Route::get('/women', [ProductController::class, 'womenShoes']);
Route::get('/youth', [ProductController::class, 'youthShoes']);
Route::get('/apparel', [ProductController::class, 'apparels']);
Route::get('/used', [ProductController::class, 'usedShoes']);

Route::post('/product', [ProductController::class, 'store']);
Route::post('/cache-products', [ProductController::class, 'cacheProducts']);

Route::get('/create-product', [DashboardController::class, 'index']);
