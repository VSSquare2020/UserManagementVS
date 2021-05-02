@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <a class="btn btn-secondary" href="/users">Go Back</a>
    <h3 class="text-center">{{@$user->name}}</h3>
    <div class="row">
        <div class="offset-md-2 col-md-8 mt-3 user-info">
            <div class="text-center mb-4">
                <img class="profile_image text-center" src="{{(@$user->image == NULL) ? '/img/no-photo.png' : '/storage/' . $user->image }}" alt="image">
            </div>

            <p><strong>CLO CARD NO: </strong> {{@$user->clo_card_no}}</p> 
            <p><strong>ARMY NO: </strong> {{@$user->army_number}}</p> 
            <p><strong>RANK: </strong> {{@$user->rank}}</p> 
            <p><strong>BATTERY: </strong> {{@$user->battery}}</p> 
        </div>
    </div>
</div>
@endsection