<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;

// PublicController
Route::get('/', [PublicController::class, 'home'])->name('home');

// ProductController
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products', [ProductController::class, 'store'])->name('product.store');
Route::get('/products', [ProductController::class, 'index'])->name('product.index');

