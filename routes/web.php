<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Product Routes
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::prefix('products')->controller(ProductController::class)->name('product.')->group(function () {
    
    // Route::get('/', 'index')->name('index');
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');    
    Route::get('{id}/edit', 'edit')->name('edit');
    Route::put('{id}/update', 'update')->name('update');
    Route::delete('{id}/delete', 'destroy')->name('destroy');

});

// Category Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::prefix('categories')->controller(CategoryController::class)->name('category.')->group(function () {
    
    Route::get('{id}/show', 'show')->name('show');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');    
    Route::get('{id}/edit', 'edit')->name('edit');
    Route::put('{id}/update', 'update')->name('update');
    Route::delete('{id}/delete', 'destroy')->name('destroy');

});