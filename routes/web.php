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

Route::get('/', [ProductController::class, 'homepage']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/men', [ProductController::class, 'menIndex']);
// Route::get('/women', [ProductController::class, 'womenIndex']);
// Route::get('/youth', [ProductController::class, 'youthIndex']);
// Route::get('/apparel', [ProductController::class, 'apparelIndex']);
// Route::get('/used', [ProductController::class, 'usedIndex']);

Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class,'edit']);
Route::post('/products/{product}', [ProductController::class,'update'])->name('updateProduct');
Route::delete('/products/{product}', [ProductController::class,'destroy'])->name('updateProduct');


Route::post('/cache-products', [ProductController::class, 'cacheProducts']);


