@extends('layouts.adminLayout')

@section('content')
    <div class="container">
            <h3 class="text-center">Edit User</h3>
            @if(session()->has('message'))
                <p class="alert alert-success">{{session('message')}}</p>
            @endif
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form method="POST" action={{url('products/' . $product->id)}} enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{@$product->product_name}}" id="full_name">
                        @error('name')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_life">Product Life in Month.</label>
                        <input type="number" name="product_life" class="form-control @error('product_life') is-invalid @enderror" value="{{@$product->product_life_month}}" id="product_life">
                        @error('product_life')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{@$product->quantity}}" id="quantity">
                        @error('quantity')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-file">    
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Upload Image</label>
                        </div>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection