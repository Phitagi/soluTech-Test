
@extends('layouts.base')

@section('content')
<div class='pageHedDiv' style='padding:0px 50px;'><h3>Edit {{$product->name}}</h3></div>
<form method="POST" action="{{ route('products.update',$product) }}" class='createProdForm'>
    @csrf
    @method('PUT') 
    <div class="form-group">
        <label for="username">Product name</label>
        <input class="form-control" placeholder="" type="text" name="name" value="{{ $product->name }}" required>
        @error('name')
            <div style="color:red;">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="username">Description</label>
        <textarea class="form-control" name="description" required>{{ $product->description }}</textarea>
        @error('description')
            <div style="color:red;">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="username">Quantity</label>
        <input class="form-control" placeholder="" type="number" name="quantity" value="{{ $product->quantity }}" required>
        @error('description')
            <div style="color:red;">{{$message}}</div>
        @enderror
    </div>

    <input class="form-control" type="submit" name="updProduct" value="submit">
</form>
@endsection