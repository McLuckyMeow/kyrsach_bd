<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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



Route::get('/', [HomeController::class, 'index'])->name('homepage');


Auth::routes();

Route::prefix('product')->name('product.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('all');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/{product}', [ProductController::class, 'show'])->name('single');
    Route::post('/delete/{product}', [ProductController::class, 'destroy'])->name('delete');
    Route::get('/edit/{product}', [ProductController::class, 'editView'])->name('edit_view');
    Route::post('/edit/{product}', [ProductController::class, 'update'])->name('edit');
//    Route::get('/search',  [ProductController::class, 'search'])->name('search');
});
Route::prefix('/checkout')->name('checkout.')->group(function () {
    Route::get('/', [BasketController::class, 'index'])->name('index');
    Route::post('/', [BasketController::class, 'create'])->middleware('auth')->name('buy');
    Route::post('/{basket}', [BasketController::class, 'destroy'])->name('del');
    Route::get('/check', [BasketController::class, 'wordExport'])->name('check');
    Route::post('/check/edit/{basket}', [BasketController::class, 'editCount'])->name('edit');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::post('/delete/{user}', [AdminController::class, 'destroy'])->name('delete');
});
