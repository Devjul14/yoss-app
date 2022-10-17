<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hai');
        $products = Product::paginate(20);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('hai');
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);


        Product::create($validateData);

        return redirect('products')->with('success', 'New Product has been added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // dd($product);
        return view('product.edit', [
            "product" => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);
        // dd($validateData, $id);
        Product::where('id', $id)
            ->update($validateData);

        return redirect('products')->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('hai');
        Product::destroy($id);

        return redirect('products')->with('success', 'Product has been deleted!');
    }

    public function getProducts(Request $request){

        $search = $request->search;
  
        if($search == ''){
           $products = Product::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
           $products = Product::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($products as $product){
            $response[] = array(
                "value" => $product->id,
                "label" => $product->name
            );
        }
  
        return response()->json($response);
     }

     public function getProductDetails(Request $request) {
         $id = $request->id;
         $data = Product::Where('id', $id)->first();
        $response = array(
            "id" => $data->id,
            "name" => $data->name,
            "type" => $data->type,
            "price" => $data->price,
            "stock" => $data->stock
        );

         return response()->json($response);
     }
}
