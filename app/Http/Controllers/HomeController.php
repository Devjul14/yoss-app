<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dashboard()
    {
        $count_transaction =  DB::table('transactions')
        ->whereDate('created_at', Carbon::today())
            ->count();

        $count_product = Product::count();
        $count_sales =  DB::table('detail_transactions')
            ->selectRaw('SUM(products.price) as total_price')
            ->leftJoin('products', 'products.id', '=', 'detail_transactions.product_id')
        ->whereDate('detail_transactions.created_at', Carbon::today())
            ->first()->total_price;

        $pendapatan = number_format($count_sales, 0, ',', '.');

        $count_users = User::count();

        $Salesofday = DB::table('detail_transactions')
        ->select(DB::raw('DATE_FORMAT(detail_transactions.created_at, "%W") as hari, SUM(products.price) as count'))
        ->leftJoin('products', 'products.id', '=', 'detail_transactions.product_id')
        ->whereBetween('detail_transactions.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->groupBy(DB::raw('DATE_FORMAT(detail_transactions.created_at, "%W")'))
            ->get();

        foreach ($Salesofday as $sales) {
            $labels[] = $sales->hari;
            $datasets[] = $sales->count;
        }

        // mengirim variable ke chart
        $labels = json_encode($labels);
        $datasets = json_encode($datasets);

        // dd($labels, $datasets);
        return view('welcome', compact('count_transaction', 'count_product', 'pendapatan', 'count_users', 'labels', 'datasets'));
    }
}
