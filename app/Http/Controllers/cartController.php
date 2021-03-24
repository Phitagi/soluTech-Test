<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class cartController extends Controller
{
    public function add(Request $request,Product $product)
    {
            $inCart=$this->inCart($product);
            $request->session->push('cart',$product);    
            $this->cartNo();

        return back(); //redirect()->route('products.index');
    }

    public function drop(Request $request,Product $product)
    {

        $o=-1;
        foreach($request->session->get('cart') as $prod){$o++;
            if($prod->id == $product->id){
                unset($request->session->get('cart')[$o]);
            }
        }
        $this->cartNo();

        return back(); //redirect()->route('products.index');
    }

    public function inCart(Request $request,Product $product)
    {
        $o=0;
        foreach($request->session->get('cart') as $prod){
            if($prod->id == $product->id){
                $o=1;
            }
        }

        if($o==1){return true;}else{return false;}
    }

    public function cartNo(Request $request,Product $product)
    {
        $request->session->put('cartNo',count($request->session->get('cart')));

    }

}
