<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\LoginController;
//use App\Http\Controllers\NewsController;

Route::view('{any?}', 'app')->where('any', '.*');

Auth::routes();

//Route::view('/', 'home');
//
//Route::get('/login', [LoginController::class, 'index'])->name('login');
//
//Route::post('/login', [LoginController::class, 'authenticate'])->name('_login');
//
//Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
//
//    Route::redirect('', 'admin/news');
//
//    Route::resource('/news', NewsController::class);
//
//
//});
