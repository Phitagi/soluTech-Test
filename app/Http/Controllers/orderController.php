<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; use App\Models\Order_detail;
use App\Models\Product;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::all();//paginate(20);
        return $orders; //view('orders.index',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order_number=random_int(2,5)*time();

        $newOrder=Order::create([
            'order_number' => $order_number,
        ]);
        Order_detail::create([
            'order_id' => $newOrder->id,
            'product_id' => $request->productId
        ]);

        return $newOrder; //redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        //$orderDetails=Order_detail::where('order_id',$order->id)->get();
        $order=Order::find($order);
        $orderDetails=$order->details; 
        $orderDets=[];
        foreach($orderDetails as $detail){
            $productName=$detail->product->name;
            $orderDets[]=array(
                    "order_number"=>$detail->order->order_number,
                    "productName"=>$productName,
                    "detailId"=>$detail->id
                );
            
        }
        return $orderDets; //view('orders.show',['order'=>$order,'orderDetails' => $orderDetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    { 
        return view('orders.edit',['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->order_number=$request->order_number;
        $order->save();

        return back(); //redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }
}
