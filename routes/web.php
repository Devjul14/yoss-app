<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PDFController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/home', function () {
    return view('welcome');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // master
    Route::resource('/products', 'Productcontroller');
    Route::resource('/store', 'StoreController');
    Route::resource('/customer', 'CustomerController');
Route::get('customer/{id}', 'App\Http\Controllers\CustomerController@destroy');

// transaction
Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/create-invoice', [TransactionController::class, 'create']);
Route::post('/create-invoice', [TransactionController::class, 'store']);
Route::get('/priviewInvoice', [TransactionController::class, 'priviewInvoice']);
    Route::get('/invoice-detail/{id}', [TransactionController::class, 'Invoicedetail']);
    Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);

//ajax
Route::get('/get-product-details', [ProductController::class, 'getProductDetails'])->name('product.getProductDetails');

//autocomplete
Route::get('/get-products', [ProductController::class, 'getProducts'])->name('product.getProducts');
Route::get('/get-customers', [CustomerController::class, 'getCustomers'])->name('customer.getCustomers');
});