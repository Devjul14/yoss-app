<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dashboard()
    {
        $count_transaction = Transaction::count();
        $count_product = Product::count();
        $count_sales =  DB::table('detail_transactions')
            ->selectRaw('SUM(products.price) as total_price')
            ->leftJoin('products', 'products.id', '=', 'detail_transactions.product_id')
            ->first()->total_price;

        $pendapatan = number_format($count_sales, 0, ',', '.');

        $count_users = User::count();

        // dd($count_transaction, $count_product, $count_sales, $count_users);
        return view('welcome', compact('count_transaction', 'count_product', 'pendapatan', 'count_users'));
    }
}
