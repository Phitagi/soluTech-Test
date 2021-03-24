
@extends('layouts.base')

@section('content')
<div class='pageHedDiv' style='padding:0px 50px;'><h3>Edit {{$supplier->name}}</h3></div>
<form method="POST" action="{{ route('supplier.update',$supplier) }}" class='updateSuppForm'>
    @csrf
    @method('PUT') 
    <div class="form-group">
        <label for="username">Supplier name</label>
        <input class="form-control" placeholder="" type="text" name="name" value="{{ $supplier->name }}" required>
        @error('name')
            <div style="color:red;">{{$message}}</div>
        @enderror
    </div>

    <input class="form-control" type="submit" name="updSupplier" value="submit">
</form>
@endsection