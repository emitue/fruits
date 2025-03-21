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

// 商品一覧画面
Route::get('/products', [ProductController::class,'index'])->name('products.index');
// 商品詳細
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.edit');
// 商品更新
Route::post('/products/{productId}/update', [ProductController::class, 'update'])->name('products.show');
// 商品登録画面
Route::get('/products/register',  [ProductController::class, 'create'])->name('products.create');
// 商品登録
Route::post('/products/register', [ProductController::class, 'store']);
// 検索
Route::get('/products/search', [ProductController::class, 'getSearch']);
Route::post('/products/search', [ProductController::class, 'postSearch']);
// 削除
Route::delete('/products/{productId}/delete', [ProductController::class, 'delete'])->name('products.destroy');