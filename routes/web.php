<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/home', function () {
    return view('welcome');
});

// master
Route::resource('/products', ProductController::class);
Route::resource('/store', StoreController::class);
Route::resource('/customer', CustomerController::class);
Route::get('customer/{id}', 'App\Http\Controllers\CustomerController@destroy');

// transaction

Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/create-invoice', [TransactionController::class, 'create']);
