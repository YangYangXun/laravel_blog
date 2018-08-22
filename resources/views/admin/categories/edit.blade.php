@extends('layouts.admin')
@section('content')
<h1>Admin category edit</h1>


{!! Form::open(['method' => 'patch', 'action' => ['AdminCategoriesController@update',$category->id], 'class'=>'mt-5']) !!} {{

csrf_field() }}

<div class="form-group">
    {!! Form::label('name', 'Name:') !!} {!! Form::text('name', $category->name ,['class' => 'form-control']) !!}
</div>


<button type="submit" class="btn btn-outline-primary btn-block">Update</button> {!! Form::close() !!}
@include('includes.form_error')
<div style="margin-top: 20px">
    {!! Form::open(['method' => 'delete', 'action' => ['AdminCategoriesController@destroy',$category->id], 'class'=>'']) !!} {{ csrf_field()
    }}

    <button type="submit" class="btn btn-danger btn-block">Delete</button> {!! Form::close() !!}
</div>
@endsection
