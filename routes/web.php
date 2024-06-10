<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\spatie\PermissionController;
use App\Http\Controllers\spatie\RoleController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});

Route::middleware(['auth'])->group(function () {
    
    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
    
    // Product Routes
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::prefix('products')->controller(ProductController::class)->name('product.')->group(function () {
        
        Route::get('{id}/show', 'show')->name('show');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');    
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
        Route::delete('{id}/delete', 'destroy')->name('destroy');
    
    });

    // Category Routes
    Route::prefix('categories')->controller(CategoryController::class)->name('category.')->group(function () {
        
        Route::get('/', 'index')->name('index');
        Route::get('{id}/show', 'show')->name('show');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');    
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update');
        Route::delete('{id}/delete', 'destroy')->name('destroy');
    
    });
});

