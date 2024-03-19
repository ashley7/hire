<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HireController;
use App\Http\Controllers\HireDetailController;
use App\Http\Controllers\HirePaymentController;
use App\Http\Controllers\HireReturnController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth','verified']], function () {  

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('products',ProductController::class);

    Route::resource('users',UserController::class);

    Route::resource('hires',HireController::class);

    Route::get('add_items/{hire_id}',[HireController::class,'add_items']);

    Route::resource('hire_details',HireDetailController::class);

    Route::resource('hire_payments',HirePaymentController::class);

    Route::resource('hire_returns',HireReturnController::class);

    Route::resource('categories',CategoryController::class);

    Route::resource('expenses',ExpenseController::class);

});