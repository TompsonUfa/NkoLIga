<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum' , 'prefix' => 'admin', 'name' => 'admin.'], function (){

    Route::apiResource('news', NewsController::class);

    Route::apiResource('abouts', AboutController::class);

    Route::apiResource('team', TeamController::class);

    Route::apiResource('contacts', ContactController::class);
});
