
@extends('layouts.base')

@section('content')
<div class='pageHedDiv' style='padding:0px 50px;'><h3>Edit {{$supp_product->product->name}}</h3></div>
<form method="POST" action="{{ route('supplierProduct.update',$supp_product->id) }}" class='updateSuppForm'>
    @csrf
    @method('PUT') 
    <div class="form-group">
        <label for="username">Supplier </label>
        <input class="form-control" placeholder="" type="text" name="name" value="{{ $supp_product->supplier->name }}" required>
        @error('name')
            <div style="color:red;">{{$message}}</div>
        @enderror
    </div>

    <input class="form-control" type="submit" name="updSupplier" value="submit">
</form>
@endsection