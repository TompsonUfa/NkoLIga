<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;


Route::view('/', 'home');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('_login');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function (){

   Route::redirect('', 'admin/news');

   Route::prefix('news')->name('news.')->group(function (){

       Route::get('', [NewsController::class, 'index'])->name('index');

       Route::get('/create', [NewsController::class, 'create'])->name('create');
   });
});
