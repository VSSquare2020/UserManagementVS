@extends('layouts.adminLayout')

@section('content')
    <div class="container">
            <h3 class="text-center">Check Due Products</h3>

            @if(session()->has('message'))
                <p class="alert alert-success">{{session('message')}}</p>
            @endif
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form method="POST" action="/issue/due_date" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="battery">Battery</label>
                        <select class="form-control" name="battery" id="battery">
                            <option value="">Select Battery</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="HQ">HQ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="battery">Select Month</label>
                        <select class="form-control" name="month" id="month">
                            <option value=''>--Select Month--</option>
                            <option value='1'>Janaury</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year">Select year</label>
                        <input type="text" autocomplete="off" class="yearpicker" value="" name="year" id="year">
                        <!-- <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity"> -->
                        @error('year')
                            <div class="invalid-feedback">
                                    {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">FETCH</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection