@extends('layouts.admin')


@section('content')

<h1>Users/create</h1>



    {{-- action導向controller method --}}
    <form method="post" action="{{ action('AdminUsersController@store') }}" >

        {{ csrf_field() }}

        <div class="form-group">
            <label for="exampleFormControlInput1">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email:</label>
            <input type="text" class="form-control" name="email" placeholder="email">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Role:</label>
            <input type="text" class="form-control" name="role_id" placeholder="role">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Status:</label>
            <input type="text" class="form-control" name="is_active" placeholder="status">
        </div>



        <button type="submit" class="btn btn-outline-primary btn-block">發布</button>
    </form>





@endsection
