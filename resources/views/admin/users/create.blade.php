@extends('layouts.admin')


@section('content')

<h1>Users/create</h1>



    {{-- actionå°Žå?‘controller method --}}
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
             <select class="form-control" name="role_id" id="role_id">
                <option value="" selected>-- Choose Option --</option>
                @if($roles)
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Status:</label>
            <select class="form-control" name="is_active" id="status">
                <option value="1">Active</option>
                <option value="0" selected>Not Active</option>
            </select>
        </div>

         <div class="form-group">
               {!! Form::label('file', 'File:') !!}
               {!! Form::file('file', null ,['class' => 'form-control']) !!}
         </div>

        <div class="form-group">
             {!! Form::label('password', 'Password') !!}
             {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>


        <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
    </form>


    @include('includes.form_error')


@endsection
