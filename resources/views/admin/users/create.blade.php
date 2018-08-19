@extends('layouts.admin')


@section('content')

<h1>Users/create</h1>


    {!! Form::open(['method' => 'post', 'action' => 'AdminUsersController@store', 'class'=>'mt-5', 'files' => true ]) !!}
                {{ csrf_field() }}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null ,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null ,['class' => 'form-control']) !!}
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
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null ,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>


            <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>


            
    {!! Form::close() !!}



    @include('includes.form_error')


@endsection
