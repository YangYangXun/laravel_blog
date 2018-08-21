@extends('layouts.admin')
@section('content')
<h1>Posts create</h1>




{!! Form::open(['method' => 'post', 'action' => 'AdminPostsController@store', 'class'=>'mt-5', 'files' => true ]) !!} {{
csrf_field() }}

<div class="form-group">
    {!! Form::label('title', 'Title:') !!} {!! Form::text('title', null ,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!} {!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null ,['class' => 'form-control'])
    !!}
</div>

<div class="form-group">
    {!! Form::label('photo_id', 'Photo:') !!} {!! Form::file('photo_id', null ,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Desc:') !!} {!! Form::textarea('body', null ,['class' => 'form-control', 'rows'=>3]) !!}
</div>
    @include('includes.form_error')


<button type="submit" class="btn btn-outline-primary btn-block">Submit</button> {!! Form::close() !!}
@endsection
