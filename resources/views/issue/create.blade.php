@extends('layouts.adminLayout')

@section('content')

<div class="container">
    <div class="row">
        <div class="user_info">
            <p>User Name : {{@$user->name}} </p>
            <p>CLO NO : {{@$user->clo_card_no}} </p>
        </div>
    </div>
    <div class="row">
        <div class="issue_form">
            <div>Issue Product : <button class="add_more btn btn-primary">ADD More</button> </div> 
            <form action="/issue/store" method="post">
                @csrf
                @if(session()->has('success'))
                <p class="alert alert-success">{{session('success')}}</p>
                @elseif(session()->has('error'))
                <p class="alert alert-danger">{{session('error')}}</p>
                @endif
                <input type="text" style="display:none" name="user_id" value="{{@$user->id}}">
                <div class="product_div">
                    <div class="product-field-group">
                        <div class="form-group">
                            <label for="permissionSelect">Product</label>
                            <select class="form-control" name="product_id[]" id="product_id[]">
                                <option value="-1">Select Product</option>
                                @if(@$products && count($products)>0)
                                    @foreach($products as $key=>$product)
                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity.</label>
                            <input type="number" name="quantity[]" class="form-control @error('quantity') is-invalid @enderror" id="quantity[]">
                            @error('quantity')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-2">  
                            @if($key == 0)                                        
                            <a href="javascript:void(0);" class="btn btn-default add_more" title="Add field"><i class="fa fa-plus"></i></a>
                            @else
                            <a href="javascript:void(0);" class="btn btn-danger remove_button" title="Add field"><i class="fa fa-remove"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <input style="margin-top:20px" class="btn btn-primary" type="submit" value="Issue Items">

            </form>
        </div>
    </div>

</div>

@endsection