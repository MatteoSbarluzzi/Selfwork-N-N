<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/products', [ProductController::class, 'index'])->name('product.index');


Route::post('/products', [ProductController::class, 'store'])->name('product.store');
