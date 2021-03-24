<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::all();//paginate(20);
        return $suppliers; //view('suppliers.index',['suppliers'=>$suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
        ]);

        $newSupplier=Supplier::create([
            'name' => $request->namee,
        ]);

        return $newSupplier; //redirect()->route('supplier.index')->with('success','Supplier added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($supplier)
    {   $supplier=Supplier::find($supplier);
        return $supplier;//view('suppliers.show',['supplier'=>$supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit',['supplier'=>$supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$supplier)
    {
        $supplier=Supplier::find($supplier);
        $supplier->name=$request->namee;
        $supplier->save();

        return $supplier;
        //redirect()->route('supplier.show',$supplier)->with('success','Supplier has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($supplier)
    {
        $supplier=Supplier::find($supplier);
        $supplier->delete(); 
        return 'success';//redirect()->route('supplier.index')->with('success','Supplier has been deleted successfully.');
    }
}
