<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('product')->group(function () {
    Route::get('/product', function () {
    return view('product.index');
    })->name('index');

    Route::get('/product/add', function () {
    return view('product.add');
    })->name('add');

    Route::get('/product/{id?}', function ( int $id ) {
    return view('product.detail', ['id' => $id]);
    })->name('detail');
});

Route::fallback( function () {
    return view('error.404');
});
