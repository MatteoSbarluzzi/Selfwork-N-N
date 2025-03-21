<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;

// PublicController
Route::get('/', [PublicController::class, 'home'])->name('home');

// ProductController
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create')->middleware('auth');
Route::post('/products', [ProductController::class, 'store'])->name('product.store')->middleware('auth');
Route::get('/products', [ProductController::class, 'index'])->name('product.index');

// ArticleController
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store')->middleware('auth');

Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
