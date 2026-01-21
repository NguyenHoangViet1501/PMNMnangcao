<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('product')->group(function () {
    Route::get('/', function () {
    return view('product.index');
    })->name('index');

    Route::get('/add', function () {
    return view('product.add');
    })->name('add');

    Route::get('/{id?}', function ( string $id = '123') {
    return view('product.detail', ['id' => $id]);
    })->name('detail');
});

Route::get('/sinhvien/{name?}/{mssv?}', function (string $name = 'Luong Xuan Hieu', string $mssv ='123456') {
    return view('sinhvien', ['name' => $name, 'mssv' => $mssv]);
})->name('sinhvien');

Route::fallback( function () {
    return view('error.404');
});

Route::get('/banco/{n?}', function ( int $n = 5) {
    return view('banco', ['n' => $n]);
});
