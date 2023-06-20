<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Location\LocationController;
use App\Http\Controllers\Catalog\CatalogController;


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

Route::get('/', [MainPageController::class, 'index'])->name('welcome');

Auth::routes();

Route::prefix('user')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
});

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/location', [LocationController::class, 'index'])->name('location.index');

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');


Route::prefix('admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Add more routes for different admin panel features

    // CRUD Products
    Route::get('products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/products/create-products', [ProductController::class, 'create'])->name('admin.create-products');
    Route::post('/products/store-products', [ProductController::class, 'store'])->name('admin.create-products-store');
    Route::get('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('admin.products-destroy');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('edit-products');
});


Route::get('/products/{id}/show', [ProductController::class, 'show'])->name('products-show');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products-update');
