<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AgeController;
use App\Http\Middleware\CheckAge;

Route::get('/', function () {
    return view('home');
});

Route::prefix('product')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/detail/{id}', 'detail');
        Route::get('/add', 'create');
        Route::post('/store', 'store');
    });

});

Route::prefix('auth')->group(function (){
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login');
        Route::post('/check-login', 'checkLogin');
        Route::get('/register', 'register');
        Route::post('/check-register', 'checkRegister');
    });
});

Route::resource('test', TestController::class);

Route::resource('categories', \App\Http\Controllers\CategoryController::class);

Route::get('/sinhvien/{name?}/{mssv?}', function (string $name = 'Luong Xuan Hieu', string $mssv ='123456') {
    return view('sinhvien', ['name' => $name, 'mssv' => $mssv]);
})->name('sinhvien');

Route::fallback( function () {
    return view('error.404');
});

Route::get('/banco/{n?}', function ( int $n = 5) {
    return view('banco', ['n' => $n]);
});

Route::prefix('age')->group(function () {
    Route::controller(AgeController::class)->group(function () {
        Route::get('/', 'showForm');
        Route::post('/save', 'saveAge');
        Route::get('/secret', 'secret')->middleware(CheckAge::class);
    });
});

Route::get('/admin', function() {
    $title = 'Admin Dashboard';
    return view('layout/admin', compact('title'));
});
