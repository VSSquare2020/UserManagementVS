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
        <div class="offset-md-2 col-md-8 mt-3 user-info">

            <p><strong>User Name: </strong> <p class="user_name"></p> </p> 
            <p><strong>ARMY NO: </strong> <p class="army_no"></p> </p> 
            <p><strong>RANK: </strong>  <p class="rank"></p></p> 
            <p><strong>BATTERY: </strong> <p class="battery"></p></p> 
        </div>
        <div class="proceed_div" style="display:none">
            <Button class="proceed_btn">Proceed</Button>
        </div>
    </div>

    </div>
</div>






@endsection