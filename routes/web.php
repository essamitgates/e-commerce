<?php

use App\Models\Cart;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', [CategoryController::class, 'index']);

Route::get('product/search', [ProductController::class, 'searchProduct'])->name('product.search');
Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
Route::resource('cart', CartController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
