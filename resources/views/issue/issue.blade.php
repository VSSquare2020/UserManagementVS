@extends('layouts.adminLayout')

@section('content')

<div class="container">
    <h3>Issue Products</h3>

    <div class="row">
        <div class="user-field">
            <div class="form-group">
                <label for="clo_number">CLO CARD NO</label>
                <input type="number" name="clo_number" class="form-control" id="clo_number">
                <button class="fetch_user">Fetch User</button>
            </div>
        </div>
    </div>
        <div class="user-info">

            <div class="user_details"><p>User Name: </p> <p class="user_name"></p> </div> 
            <div class="user_details"><p>ARMY NO: </p> <p class="army_no"></p> </div> 
            <div class="user_details"><p>RANK: </p>  <p class="rank"></p></div> 
            <div class="user_details"><p>BATTERY: </p> <p class="battery"></p></div> 
        </div>
        <div class="proceed_div" style="display:none">
            <Button class="proceed_btn">Proceed</Button>
        </div>
</div>






@endsection