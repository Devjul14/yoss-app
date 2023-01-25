<?php

namespace App\Http\Controllers;

use \PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function generatePDF($id)
    {
        $transactions = DB::table('transactions')
        ->select(
            '*',
            'transactions.id as transaction_id',
            'customers.name as customer',
            'customers.address as customers_address',
            'customers.phone as customers_phone',
            'stores.name as store_name',
            'stores.address as stores_address',
            'stores.phone as stores_phone',
        )
            ->leftjoin('customers', 'customers.id', '=', 'transactions.customer_id')
            ->leftjoin('stores', 'stores.id', '=', 'transactions.store_id')
            ->leftjoin('detail_transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
            ->leftjoin('products', 'products.id', '=', 'detail_transactions.product_id')
            ->where('transactions.id', $id)
            ->orderBy('transactions.id', 'desc')
            ->first();

        $detail_transactions = DB::table('detail_transactions')
        ->leftjoin('products', 'products.id', '=', 'detail_transactions.product_id')
            ->where('detail_transactions.transaction_id', $transactions->transaction_id)
            ->get();

        $totalPrice = DB::table('detail_transactions')
        ->leftjoin('products', 'products.id', '=', 'detail_transactions.product_id')
            ->where('detail_transactions.transaction_id', $transactions->transaction_id)
            ->sum('products.price');
        // dd($detail_transactions);
        $data = [
            'title' => 'Invoice' . $id,
            'transactions' => $transactions,
            'detail_transactions' => $detail_transactions,
            'totalPrice' => $totalPrice
        ];

        $pdf = PDF::setPaper('A5', 'landscape')->loadView('myPDF', $data);
        return $pdf->stream();
    }
}
