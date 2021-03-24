
@extends('layouts.base')

@section('content')
<?php $cart=Session::get('cart'); 

if(Session::has('cart')){?>
<div class='cartDiv'>

    <table class="table table-condensed table-bordered table-responsive table-hover">
        <thead>
            <td>Product</td>
            <td></td>
        </thead>
        <tbody>
        @foreach($cart as $product) 
            <tr>
                <td>{{$product->name}}</td>
                <td><a href="{{route('cart',[$product,'remove'])}}">Remove</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class='makeOrderDiv'><a href="{{route('submit_cart')}}"><button>Order</button></a></div>
</div>
<?php }else{echo"<div>No item in cart</div>";} ?>
@endsection