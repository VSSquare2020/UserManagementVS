@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="create_btn">
        <a href="/issue">Create New</a> 
    </div>
    <table id="user_view_table" class="table text-center">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Product Name</th>
            <th scope="col">User Id</th>
            <th scope="col">User name</th>
            <th scope="col">Product life (month)</th>
            <th scope="col">Quantity</th>
            <th scope="col">Issue Date</th>
            <th scope="col">Due Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach (@$products as $product)
            <tr style="backgroundColor:#fff">
                <td>{{@$product->product->product_name}}</td>
                <td>{{@$product->user->id}}</td>
                <td>{{@$product->user->name}}</td>
                <td>{{@$product->product->product_life_month}}</td>
                <td>{{@$product->quantity}}</td>
                <td>{{@$product->updated_at}}</td>
                <td style="color:red;">{{@$product->due_date ? date('d-m-Y',strtotime($product->due_date)) : '-'}}</td>  
                <td class="{{$product->status}}">{{@$product->status}}</td>  
                <td class="justify-content-center"> 
                    <a href="products/{{@$product->id}}" class="btn btn-info btn-sm text-light">View</a>
                    <form action="{{url('issue/return/'.@$product->id)}}" method="POST" style="display:inline-block">
                        @csrf
                        @if($product->status == 'ISSUED')
                        <input type="hidden" name="uid" value="{{@$product->user->id}}">
                        <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm text-light" value="Return">
                        @endif

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection