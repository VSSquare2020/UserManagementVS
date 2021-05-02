@extends('layouts.adminLayout')

@section('content')
    <div class="container">
            <h3 class="text-center">Edit User</h3>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form method="POST" action="{{url('users/' . $user->id)}}" enctype="multipart/form-data">
                    @if(session()->has('message'))
                    <p class="alert alert-success">{{session('message')}}</p>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="full_name" value="{{@$user->name}}">
                        @error('name')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="army_no">Army No.</label>
                        <input type="text" name="army_no" class="form-control @error('army_no') is-invalid @enderror" id="army_no" value="{{@$user->army_number}}">
                        @error('army_no')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="army_no">CLO CARD No.</label>
                        <input type="number" name="clo_no" class="form-control @error('clo_no') is-invalid @enderror" id="clo_no" value="{{@$user->clo_card_no}}">
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
                            <option <?php if($user->rank == 'Sub. Major') {echo 'selected';} ?>value="Sub. Major">Sub. Major</option>
                            <option <?php if($user->rank == 'Sub') {echo 'selected';} ?> value="Sub">Sub</option>
                            <option <?php if($user->rank == 'Nb Sub') {echo 'selected';} ?> value="Nb Sub">Nb Sub</option>
                            <option <?php if($user->rank == 'RHM') {echo 'selected';} ?> value="RHM">RHM </option>
                            <option <?php if($user->rank == 'BHM') {echo 'selected';} ?> value="BHM">BHM </option>
                            <option <?php if($user->rank == 'HAV') {echo 'selected';} ?> value="HAV">HAV</option>
                            <option  <?php if($user->rank == 'LHAV') {echo 'selected';} ?> value="LHAV">LHAV</option>
                            <option  <?php if($user->rank == 'NK') {echo 'selected';} ?> value="NK">NK</option>
                            <option <?php if($user->rank == 'SIGM') {echo 'selected';} ?> value="RHM">SIGM </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="permissionSelect">Battery</label>
                        <select class="form-control" name="battery" id="battery">
                            <option <?php if($user->battery == 'P') {echo 'selected';} ?> value="P">P</option>
                            <option <?php if($user->battery == 'Q') {echo 'selected';} ?> value="Q">Q</option>
                            <option <?php if($user->battery == 'R') {echo 'selected';} ?> value="R">R</option>
                            <option <?php if($user->battery == 'HQ') {echo 'selected';} ?> value="HQ">HQ </option>
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
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{$user->address}}">
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
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection