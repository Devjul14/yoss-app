<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transaction.index');
    }

    public function create()
    {
        $now = Carbon::now()->format('d F Y');
        // dd($now);
        return view('transaction.create', compact('now'));
    }
}
