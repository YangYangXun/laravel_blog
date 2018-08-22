@extends('layouts.admin')
@section('content')
<h1>Admin category create</h1>




{!! Form::open(['method' => 'post', 'action' => 'AdminCategoriesController@store', 'class'=>'mt-5', 'files' => true ]) !!} {{
csrf_field() }}

<div class="form-group">
    {!! Form::label('name', 'Name:') !!} {!! Form::text('name', null ,['class' => 'form-control']) !!}
</div>


<button type="submit" class="btn btn-outline-primary btn-block">Submit</button> {!! Form::close() !!}
 @include('includes.form_error')


@endsection
