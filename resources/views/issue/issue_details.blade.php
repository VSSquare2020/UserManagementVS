@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="custom-control">
        <a href="/issue/create/{{@$user->id}}">Create New</a> 
    </div>
    <table id="user_view_table" class="table text-center">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Product_id</th>
            <th scope="col">Name</th>
            <th scope="col">Product life (month)</th>
            <th scope="col">Quantity</th>
            <th scope="col">Issue Date</th>
            <th scope="col">Due Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr style="backgroundColor:#fff">
                <td>{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_life_month}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->updated_at}}</td>
                <td>{{@$due_date}}</td>  
                <td class="justify-content-center"> 
                    <a href={{"products/".$product->id}} class="btn btn-info btn-sm text-light">View</a>
                    <a href={{"products/edit/".$product->id}} class="btn btn-success btn-sm text-light">Edit</a>
                    <form action="{{url('products/'.$product->id)}}" method="POST" style="display:inline-block">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm text-light" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection