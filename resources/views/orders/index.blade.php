@extends('layouts.base')

@section('content')
        <div class='ordersDiv'>

            <a href="{{ route('products.index') }}"><button class='btn'>New order</button></a><br>
            
            <table class="table table-condensed table-bordered table-responsive table-hover">
                <thead>
                    <td>#</td>   
                    <td>Order_number</td>
                    <td></td>
                </thead>
                <tbody> <?php $i=0; ?>
                @foreach($orders as $order) <?php $i++; ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$order->order_number}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Action <span class="caret"></span>
                                </button>
                        
                                <ul class="dropdown-menu" role="menu">

                                    <li><a href="{{route('order.show',$order)}}">View</a></li>

                                    <li><a href="{{route('order.edit',$order)}}">Update</a></li>

                                    <li>
                                        <form action="{{ route('order.destroy',$order) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type='submit' value='Delete' class='tableDelBut' onclick="return (confirm('Are you sure you want to delete this product?'))">
                                        </form>
                                    </li>
                                    
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{ $orders->links() }}
                </tbody>
            </table>
        </div>
@endsection