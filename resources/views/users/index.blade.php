@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row">
        <table id="user_view_table" class="table text-center">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Name</th>
                <th scope="col">CLO CARD NUMBER</th>
                <th scope="col">ARMY NO</th>
                <th scope="col">RANK</th>
                <th scope="col">BATTER</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Controls</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr style="backgroundColor:#fff">
                    <td>{{$user->name}}</td>
                    <td>{{$user->clo_card_no}}</td>
                    <td>{{$user->army_no}}</td>
                    <td>{{($user->rank_id)}}</td>
                    <td>{{($user->battery_id)}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>  
                    <td class="justify-content-center"> 
                        <a href={{"users/".$user->id}} class="btn btn-info btn-sm text-light">View</a>
                        <a href={{"users/edit/".$user->id}} class="btn btn-success btn-sm text-light">Edit</a>
                        <form action="{{url('users/'.$user->id)}}" method="POST" style="display:inline-block">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm text-light" value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <div class="display-3 text-center">No Users Available</div>
            @endforelse
            </tbody>
        </table>
        
    </div>
        {{ $users->links() }}
    </div>

@endsection