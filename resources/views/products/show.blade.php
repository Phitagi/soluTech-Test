
@extends('layouts.base')

@section('content')
    <div class='productDiv'>

        <a href="{{ route('products.edit',$product) }}"><button class='btn'>Update</button></a><br>
        
        <table class="table table-condensed table-bordered table-responsive table-hover">
            <thead>
                <td>Name</td>
                <td>Description</td>
                <td>Quantity</td>
                <td></td>
            </thead>
            <tbody>
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>
                        <form action="{{ route('products.destroy',$product) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type='submit' value='delete' class='tableDelBut' onclick="return (confirm('Are you sure you want to delete this product?'))">
                        </form>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection