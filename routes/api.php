<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\BannerController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum' , 'prefix' => 'admin', 'name' => 'admin.'], function (){

    Route::apiResource('banners', BannerController::class);

    Route::apiResource('news', AdminNewsController::class);

    Route::apiResource('abouts', AboutController::class);

    Route::apiResource('team', TeamController::class);

    Route::apiResource('contacts', ContactController::class);

});


Route::get('/news', [NewsController::class, 'index']);

Route::get('/news/popular', [NewsController::class, 'popular']);

Route::get('/news/{news}', [NewsController::class, 'show'])->middleware('increment.views:news');

//->middleware('increment.views:id');
