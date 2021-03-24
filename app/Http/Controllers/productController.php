<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;  use App\Models\Supplier;
use App\Models\Supplier_product;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return $products; //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers=Supplier::all();
        return view('products.create',['suppliers'=>$suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'namee'=>['required','max:200'],
            'description'=>['required','max:500'],
            'quantity'=>['required','max:200']
            //'email'=>['required','email','max:200']
            //'password'=>['required','confirmed','max:200']  another field should have an '_confirmed' name.
        ]);

       $newProduct=Product::create([
            'name' => $request->namee,
            'description' => $request->description,
            'quantity' => $request->quantity
        ]);

        return $newProduct;//redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        return  $product;//view('products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$product)
    {
        $product=Product::find($product);
        $product->name=$request->namee;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->save();

        return $product; back(); //redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product=Product::find($product);
        $product->delete(); 

        return 'Success'; //redirect()->route('products.index');
    }
}
