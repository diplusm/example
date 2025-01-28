<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ProductController;

//Auth::routes();

Route::post('/login', [AuthController::class, 'logina']);


Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/get', function(){
        return response()->json('hello');
    });
    
    //Analytics
    Route::prefix('analytics')->group(function(){
        Route::get('/', [AnalyticsController::class, 'index']);
    });

    Route::prefix('products')->group(function(){
        Route::get('/', [ProductController::class, 'index']);
    });
    

    Route::post('/logout',  [AuthController::class, 'logout']);
});



?>