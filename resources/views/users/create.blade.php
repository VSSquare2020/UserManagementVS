@extends('layouts.adminLayout')

@section('content')
    <div class="container">
            <h3 class="text-center">Add New User</h3>
            <div class="create_btn">
            <a href="/excel-upload">Upload Excel</a> 
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form method="POST" action="/users/store" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="full_name">
                        @error('name')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="army_no">Army No.</label>
                        <input type="text" name="army_no" class="form-control @error('army_no') is-invalid @enderror" id="army_no">
                        @error('army_no')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="army_no">CLO CARD No.</label>
                        <input type="number" name="clo_no" class="form-control @error('clo_no') is-invalid @enderror" id="clo_no">
                        @error('clo_no')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="pass">
                        @error('password')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div> -->
                    <div class="form-group">
                        <label for="permissionSelect">Rank</label>
                        <select class="form-control" name="rank" id="rank">
                            <option value="Sub. Major">Sub. Major</option>
                            <option value="Sub">Sub</option>
                            <option value="Nb Sub">Nb Sub</option>
                            <option value="RHM">RHM </option>
                            <option value="BHM">BHM </option>
                            <option value="HAV">HAV</option>
                            <option value="LHAV">LHAV</option>
                            <option value="NK">NK</option>
                            <option value="RHM">RHM </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="permissionSelect">Battery</label>
                        <select class="form-control" name="battery" id="battery">
                            <option value="1">Sub. Major</option>
                            <option value="2">Sub</option>
                            <option value="3">Nb Sub</option>
                            <option value="4">RHM </option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="male" name="gender" value="M" class="custom-control-input" />
                            <label class="custom-control-label" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="female" name="gender" value="F" class="custom-control-input" />
                            <label class="custom-control-label" for="female">Female</label>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address">
                        @error('address')
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
                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection