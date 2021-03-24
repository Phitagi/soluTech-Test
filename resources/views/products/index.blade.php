
@extends('layouts.base')

@section('content')
    <div class='mainDiv'>
        <div class='productsDiv'>

            <a href="{{ route('products.create') }}"><button class='btn'>New supply</button></a><br>
            
            <table class="table table-condensed table-bordered table-responsive table-hover">
                <thead>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Quantity</td>
                    <td></td>
                </thead>
                <tbody>
                @foreach($products as $product) 
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Action <span class="caret"></span>
                                </button>
                        
                                <ul class="dropdown-menu" role="menu">

                                    <li><a href="{{route('cart',[$product,'add'])}}">Add to cart</a></li>

                                    <li><a href="{{route('products.show',$product)}}">View</a></li>

                                    <li><a href="{{route('products.edit',$product)}}">Update</a></li>

                                    <li>
                                        <form action="{{ route('products.destroy',$product) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type='submit' value='delete' class='tableDelBut' onclick="return (confirm('Are you sure you want to delete this product?'))">
                                        </form>
                                    </li>
                                    
                                </ul>
                            </div>
                        </td>

                    </tr>
                @endforeach
                {{ $products->links() }}
                </tbody>
            </table>
        </div>
    </div>
@endsection