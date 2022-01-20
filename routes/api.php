<?php

//require_once realpath("vendor\autoload.php");
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|----------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('supplier','supplierController');
Route::apiResource('supplierProduct','supplierProductController');
Route::apiResource('products','productController');
Route::apiResource('order','orderController');
Route::apiResource('orderDetail','orderDetailController');
//Route::get("product/{id}",'productController@show');
Route::get("addCart/{product}/{action}", function (Product $product,$act){ //ADD TO CART ROUT

    if($act=='add'){ //Add product to cart
        //Check if product is in cart
        $inCart=false; $filled=Session::has('cart');
        if($filled){
            $prods= Session::get('cart');
            foreach($prods as $prod){
                if($prod->id == $product->id){
                    $inCart=true;
                }
            }
        }
        //

        //if in cart it should not be added again
        if(!$inCart){ Session::push('cart',$product); }
        //

    }else{  //Remove product from cart 

        $o=-1; $prods=Session::get('cart');
        foreach($prods as $key=>$prod){$o++;
            if($prod->id == $product->id){
                unset($prods[$key]); Session::put('cart',$prods);
            }
        }   

    }
    //dd(Session::get('cart'));

    //Update the session that is showing the number of products in the cart 
    $count= Session::has('cart') ? count(Session::get('cart')) : '';
    Session::put('cartNo',$count);
    //end

    return back();
})->name('cart');


Route::get("cart", function (){ //DISPLAY THE CART
    return view('cart');
})->name('cart.show');

Route::get("makeOrder", function (){ //SUBMIT THE CART/MAKE ORDER
    $products=Session::get('cart');

    $orderNo=random_int(1,5)*time();
    $newOrder=Order::create([
        'order_number' => $orderNo
    ]);

    foreach($products as $product){
        Order_detail::create([
            'order_id' => $newOrder->id,
            'product_id' => $product->id
        ]);
    }   
    Session::forget('cart');

    //Update the session that is showing the number of products in the cart 
    $count= Session::has('cart') ? count(Session::get('cart')) : '';
    Session::put('cartNo',$count);
    //end

    return redirect()->route('order.index');

})->name('submit_cart');



