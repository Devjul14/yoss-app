<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transaction.index');
    }

    public function create()
    {
        $now = Carbon::now()->format('d F Y');
        $transDate = Carbon::now()->format('Y-m-d');
        $products = Product::all();
        $customers = Customer::all();
        // dd($now);
        return view('transaction.create', compact('now', 'transDate', 'products', 'customers'));
    }

    public function store(Request $request)
    {
        try{        
            $validateData = $request->validate([
                'date' => 'required',
                'customer_id' => 'required',
                'store_id' => 'required',
                'user_id' => 'required',
                'status' => 'required',
            ]);
    
            DB::beginTransaction();
            $insertData = Transaction::create($validateData);
            $id =  $insertData->id;
            $total_data = $request->get('rows1');
            for($i=1; $i <= count($total_data); $i++) {
                //insert data detail
                $insertDataDetails = new DetailTransaction;
                $insertDataDetails->transaction_id = $id;
                $insertDataDetails->product_id = $_POST['product_'.$i];
                $insertDataDetails->qty = $_POST['qty_'.$i];
                $insertDataDetails->save();
    
                $updateStock = Product::Where('id', $_POST['product_'.$i])->decrement('stock', $_POST['qty_'.$i]);
            }
            DB::commit();
    
            return redirect('transaction')->with('success', 'New Invoice has been added !');
            
        }catch(\Exception $e){
            DB::rollback();
        }
    }
}
