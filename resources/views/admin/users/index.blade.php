
@extends('layouts.admin')


@section('content')

  @if (Session::has('deleted_user'))

     <p>{{session('deleted_user')}}</p>

  @endif


<h1>Users/index</h1>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Created</th>
      <th scope="col">Updated</th>
    </tr>
  </thead>
  <tbody>

  @if($users)
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><img height="50" src="{!! URL::asset($user->photo ? $user->photo->file : 'https://via.placeholder.com/400x400') !!}" ></td>
            <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{isset($user->role->name) ? $user->role->name : 'No Role'}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
    @endforeach
  @endif

  </tbody>
</table>





@endsection
