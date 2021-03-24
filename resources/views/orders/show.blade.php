
@extends('layouts.base')

@section('content')
    <div class='productDiv'>

        <div class='pageHedDiv' style='padding:0px 50px;'><h3>Order : {{$order->order_number}}</h3></div>

        <table class="table table-condensed table-bordered table-responsive table-hover">
            <thead>
                <td>Order number</td>
                <td>Product</td>
                <td></td>
            </thead>
            <tbody>
                @foreach($orderDetails as $detail)
                <tr>
                    <td>{{$order->order_number}}</td>
                    <td>{{$detail->product->name}}</td>
                    <td>
                        <form action="{{ route('orderDetail.destroy',$detail->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type='submit' value='delete' class='tableDelBut' onclick="return (confirm('Are you sure you want to drop this product from order?'))">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection