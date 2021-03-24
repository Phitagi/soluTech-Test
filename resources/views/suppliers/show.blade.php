
@extends('layouts.base')

@section('content')
    <div class='productDiv'>

        <a href="{{ route('supplier.edit',$supplier) }}"><button class='btn'>Update</button></a><br>
        
        <table class="table table-condensed table-bordered table-responsive table-hover">
            <thead>
                <td>Name</td>
                <td></td>
            </thead>
            <tbody>
                <tr>
                    <td>{{$supplier->name}}</td>
                    <td>
                        <form action="{{ route('supplier.destroy',$supplier) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type='submit' value='delete' class='tableDelBut' onclick="return (confirm('Are you sure you want to drop this supplier?'))">
                        </form>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection