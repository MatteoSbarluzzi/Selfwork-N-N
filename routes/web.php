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
Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('product.show'); // nuova rotta
Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit')->middleware('auth');
Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update')->middleware('auth');
Route::delete('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth');

// ArticleController
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store')->middleware('auth');
Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('article.update')->middleware('auth');
Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])->name('article.destroy')->middleware('auth');
