<?php

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

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.show');
Route::patch('/products/{productId}/update', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/register',[ProductController::class, 'create']);
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::delete('/products/{productId}', [ProductController::class, 'destroy']);
