
@extends('layouts.base')

@section('content')
<div class='pageHedDiv' style='padding:0px 50px;'><h3>New supply</h3></div>
<form method="POST" action="{{ route('supplierProduct.store') }}" class='createSuppForm'>
    @csrf
    <div class="form-group">
        <label for="">Supplier</label>
        <select name='supplier_id' class="form-control">
            @foreach($suppliers as $supplier)
                <option value='{{$supplier->id}}'>{{$supplier->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Products</label>
        <select name='product_id' class="form-control">
            @foreach($products as $product)
                <option value='{{$product->id}}'>{{$product->name}}</option>
            @endforeach
        </select>
    </div>
    <input class="form-control" type="submit" name="subSupply" value="submit">
</form>
@endsection