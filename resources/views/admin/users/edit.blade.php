@extends('layouts.admin')


@section('content')

<h1>Users/edit</h1>

    <div class="row">
        <div class="col-md-5">
            <img class="image-responsive image-rounded" src="{!! URL::asset($user->photo ? $user->photo->file : 'https://via.placeholder.com/400x400') !!}" >
        </div>
         <div class="col-md-7">
          {!! Form::open(['method' => 'PATCH', 'action' => ['AdminUsersController@update',$user->id], 'class'=>'mt-5', 'files' => true ]) !!}
                {{ csrf_field() }}


            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', $user->name ,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', $user->email ,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles, $user->role->id, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), $user->is_active, ['class' => 'form-control']) !!}
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

        </div>


    </div>





@endsection
