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
        $count_salesday =  DB::table('detail_transactions')
            ->selectRaw('SUM(products.price) as total_price')
            ->leftJoin('products', 'products.id', '=', 'detail_transactions.product_id')
        ->whereDate('detail_transactions.created_at', Carbon::today())
            ->first()->total_price;

        $pendapatanHarian = number_format($count_salesday, 0, ',', '.');

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $count_salesweek =  DB::table('detail_transactions')
        ->selectRaw('SUM(products.price) as total_price')
        ->leftJoin('products', 'products.id', '=', 'detail_transactions.product_id')
        ->whereBetween('detail_transactions.created_at', [$startOfWeek, $endOfWeek])
            ->first()->total_price;

        $pendapatanMingguan = number_format($count_salesweek, 0, ',', '.');

        $count_salesmonth =  DB::table('detail_transactions')
        ->selectRaw('SUM(products.price) as total_price')
        ->leftJoin('products', 'products.id', '=', 'detail_transactions.product_id')
        ->whereMonth('detail_transactions.created_at', Carbon::now()->month)
            ->first()->total_price;

        $pendapatanBulanan = number_format($count_salesmonth, 0, ',', '.');

        $count_salesYear =  DB::table('detail_transactions')
        ->selectRaw('SUM(products.price) as total_price')
        ->leftJoin('products', 'products.id', '=', 'detail_transactions.product_id')
        ->whereYear('detail_transactions.created_at', Carbon::now()->year)
            ->first()->total_price;

        $pendapatanTahunan = number_format($count_salesYear, 0, ',', '.');
        // dd($count_salesmonth, $count_salesYear);

        $count_users = User::count();

        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $Salesofday = DB::table('detail_transactions')
        ->select(DB::raw('DATE_FORMAT(detail_transactions.created_at, "%W") as hari, SUM(products.price) as count'))
        ->leftJoin('products', 'products.id', '=', 'detail_transactions.product_id')
        ->whereBetween('detail_transactions.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->groupBy(DB::raw('DATE_FORMAT(detail_transactions.created_at, "%W")'))
            ->get();

        foreach ($Salesofday as $sales) {
            $labels[] = $sales->hari;
            $datasets[] = floor($sales->count / 1000);
        }


        // dd($datasets);
        // mengirim variable ke chart
        $labels = json_encode($labels);
        $datasets = json_encode($datasets);

        // dd($labels, $datasets);
        return view('welcome', compact(
            'count_transaction',
            'count_product',
            'pendapatanHarian',
            'pendapatanMingguan',
            'pendapatanBulanan',
            'pendapatanTahunan',
            'count_users',
            'labels',
            'datasets'
        ));
    }
}
