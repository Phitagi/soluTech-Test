
@extends('layouts.base')

@section('content')
    <div class='suppliersDiv'>

        <a href="{{ route('supplier.create') }}"><button class='btn'>New supplier</button></a><br>
        @if (Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-condensed table-bordered table-responsive table-hover">
            <thead>
                <td>Name</td>
                <td></td>
            </thead>
            <tbody>
            @foreach($suppliers as $supplier) 
                <tr>
                    <td>{{$supplier->name}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                    
                            <ul class="dropdown-menu" role="menu">

                                <li><a href="{{route('supplier.show',$supplier)}}">View</a></li>

                                <li><a href="{{route('supplier.edit',$supplier)}}">Update</a></li>

                                <li>
                                    <form action="{{ route('supplier.destroy',$supplier) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type='submit' value='delete' class='tableDelBut' onclick="return (confirm('Are you sure you want to drop this supplier?'))">
                                    </form>
                                </li>
                                
                            </ul>
                        </div>
                    </td>

                </tr>
            @endforeach
            {{ $suppliers->links() }}
            </tbody>
        </table>
    </div>
@endsection