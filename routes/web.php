<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/get-data', [HomeController::class, 'index']);
Route::view('{any?}', 'app')->where('any', '.*');

Auth::routes();
