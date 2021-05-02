<table>
    <thead class="thead-dark">
        <tr>
        <th scope="col">Name</th>
        <th scope="col">CLO CARD NUMBER</th>
        <th scope="col">ARMY NO</th>
        <th scope="col">RANK</th>
        <th scope="col">BATTERY</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($users as $user)
        <tr style="backgroundColor:#fff">
            <td>{{$user->name}}</td>
            <td>{{$user->clo_card_no}}</td>
            <td>{{$user->army_number}}</td>
            <td>{{($user->rank)}}</td>
            <td>{{($user->battery)}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>  
        </tr>
    @empty
        <div class="display-3 text-center">No Users Available</div>
    @endforelse
    </tbody>
</table>