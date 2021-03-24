
@extends('layouts.base')

@section('content')
<div class='pageHedDiv' style='padding:0px 50px;'><h3>New product</h3></div>
<form method="POST" action="{{ route('products.store') }}" class='createProdForm'>
    @csrf
    <div class="form-group">
        <label for="">Product name</label>
        <input class="form-control" placeholder="" type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div style="color:red;">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <textarea class="form-control" name="description" required>{{ old('description') }}</textarea>
        @error('description')
            <div style="color:red;">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Quantity</label>
        <input class="form-control" placeholder="" type="number" name="quantity" value="{{ old('quantity') }}" required>
        @error('description')
            <div style="color:red;">{{$message}}</div>
        @enderror
    </div>

    <input class="form-control" type="submit" name="subProduct" value="submit">
</form>
@endsection