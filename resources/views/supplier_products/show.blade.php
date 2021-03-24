
@extends('layouts.base')

@section('content')
    <div class='productDiv'>

    <a href="{{ route('supplierProduct.index') }}"><span class=''>Back</span></a><br><br>
        <table class="table table-condensed table-bordered table-responsive table-hover">
            <thead>
                <td>Supplier</td>
                <td>Product</td>
            </thead>
            <tbody>
                <tr>
                    <td>{{$supp_product->supplier->name}}</td>
                    <td>{{$supp_product->product->name}}</td>
                    <td>
                        <form action="{{ route('supplierProduct.destroy',$supp_product) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type='submit' value='delete' class='tableDelBut' onclick="return (confirm('Are you sure you want to delete this supply?'))">
                        </form>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection