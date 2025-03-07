<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeasonController;

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
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::post('/products', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/{productId}', [ProductController::class, 'show'])->name('products.show');
Route::patch('/products/{productId}/update', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/register',[ProductController::class, 'create'])->name('confirm');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::delete('/products/{productId}', [ProductController::class, 'delete'])->name('products.destroy');
Route::get('/products/{productId}/update', [ProductController::class, 'edit'])->name('products.edit');
Route::prefix('season')->group(function() {
  Route::get('/', [SeasonController::class, 'index']);
  Route::get('/add', [SeasonController::class, 'add']);
  Route::get('/add', [SeasonController::class, 'create']);
});
