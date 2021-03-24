<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\Product;
use App\Models\Supplier_product; 


class supplierProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supp_products=Supplier_product::all(); //paginate(20);
        
        $supplies=[];
        foreach($supp_products as $supp_product){
            $productName=$supp_product->product->name;
            $supplierName=$supp_product->supplier->name;
            $supplies[]=array(
                "productName"=>$productName,
                "supplierName"=>$supplierName,
                "supplyId"=>$supp_product->id
            );  
        }
        return $supplies; //view('supplier_products.index',['supp_products'=>$supp_products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers=Supplier::all(); $products=Product::all();
        return view('supplier_products.create',['suppliers'=>$suppliers,'products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newSupply=Supplier_product::create([
            'supplier_id' => $request->supplier_id,
            'product_id' => $request->product_id,
        ]);

        return $newSupply; //redirect()->route('supplierProduct.index')->with('success','Supply was successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($supplierProduct)
    {
        $supp_product=Supplier_product::find($supplierProduct); 
        $productName=$supp_product->product->name;
        $supplierName=$supp_product->supplier->name;
        $supply=array(
            "productName"=>$productName,
            "supplierName"=>$supplierName,
            "supplyId"=>$supp_product->id
        );  
        return $supply;//view('supplier_products.show',['supp_product'=>$supp_product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $supp_product=Supplier_product::find($id); 
        return view('supplier_products.edit',['supp_product'=>$supp_product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $supp_product=Supplier_product::find($id); 

        $supp_product->supplier_id=$request->supplier_id;
        $supp_product->product_id=$request->product_id;

        $supp_product->save();

        return redirect()->route('supplierProduct.show',$supp_product)->with('success','Supplier has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  $supp_product=Supplier_product::find($id); 
        $supp_product->delete();
        return $supp_product;//redirect()->route('supplierProduct.index')->with('success','Supply has been deleted successfully.');
    }
}
