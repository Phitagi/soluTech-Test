
@extends('layouts.base')

@section('content')
    <div class='suppliersDiv'>

        <a href="{{ route('supplierProduct.create') }}"><button class='btn'>New supply</button></a><br>
        @if (Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-condensed table-bordered table-responsive table-hover">
            <thead>
                <td>Supplier</td>
                <td>Product</td>
                <td>Date</td>
                <td></td>
            </thead>
            <tbody>
            @foreach($supp_products as $supp_product) 
                <tr>
                    <td>{{$supp_product->supplier->name}}</td>
                    <td>{{$supp_product->product->name}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                    
                            <ul class="dropdown-menu" role="menu">

                                <li><a href="{{route('supplierProduct.show',$supp_product->id)}}">View</a></li>

                                <!--<li><a href="{{route('supplierProduct.edit',$supp_product->id)}}">Update</a></li> -->

                                <li>
                                    <form action="{{ route('supplierProduct.destroy',$supp_product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type='submit' value='delete' class='tableDelBut' onclick="return (confirm('Are you sure you want to delete this supply?'))">
                                    </form>
                                </li>
                                
                            </ul>
                        </div>
                    </td>

                </tr>
            @endforeach
            {{ $supp_products->links() }}
            </tbody>
        </table>
    </div>
@endsection