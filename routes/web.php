<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OCRController;

Auth::routes();

Route::get('/', function(){
    return view('welcome');
});

Route::get('/tesseract', function(){
    return view('tesseract');
});



Route::post('/tesseract', [OCRController::class, 'extractText'])->name('tesseract');

//Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('/login', [HomeController::class, 'index'])->name('login');

Route::middleware('auth')->group(function(){
    Route::get('/home', function () {
        return view('main');
    })->name('home');
    
    Route::prefix('customers')->group(function(){
        Route::controller(CustomerController::class)->group(function(){
            Route::get('/', 'index')->name('customer');
            Route::get('/create', 'create')->name('customer.create');
            Route::get('/{id}', 'show')->name('customer.show');
            Route::get('/{id}/edit', 'edit')->name('customer.edit');
            Route::patch('/{id}', 'update')->name('customer.update');
        }); 
    });
    
    Route::prefix('products')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/', [ProductController::class, 'store'])->name('product.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::patch('/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
    
    Route::prefix('analytics')->group(function(){
        Route::get('/', [AnalyticsController::class, 'index'])->name('analytics');
    });
});







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
