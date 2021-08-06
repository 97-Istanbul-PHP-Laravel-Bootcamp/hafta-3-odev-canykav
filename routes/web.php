<?php

use App\Http\Controllers\SaleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
Route::view('/', 'index')->name('home');


Route::prefix('admin')->group(function () {
    Route::get('category/edit', [CategoryController::class, 'create']); // Ödevde Kategori Ekleme/Düzenleme => "/admin/category/edit" şeklinde istendiği için editi create'e yönlendirdim.
    Route::get('sale/edit', [SaleController::class, 'create']); // ""
    Route::get('user/edit', [UserController::class, 'create']); // ""
    Route::get('product/edit', [ProductController::class, 'create']); // ""

    Route::resource('sale', SaleController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('product', ProductController::class);
});
