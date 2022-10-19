<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TransactionController;
use App\Models\Product;
use Illuminate\Http\Request;

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
Route::post('/create-invoice', [TransactionController::class, 'store']);
Route::get('/print-invoice', [TransactionController::class, 'printInvoice']);

//ajax
Route::get('/get-product-details', [ProductController::class, 'getProductDetails'])->name('product.getProductDetails');

//autocomplete
Route::get('/get-products', [ProductController::class, 'getProducts'])->name('product.getProducts');
Route::get('/get-customers', [CustomerController::class, 'getCustomers'])->name('customer.getCustomers');