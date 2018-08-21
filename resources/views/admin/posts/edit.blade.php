@extends('layouts.admin') 
@section('content')
<h1>Posts Edit</h1>


<h2>Edit-> {{$post->title}}</h2>

{!! Form::open(['method' => 'PATCH', 'action' => ['AdminPostsController@update',$post->id], 'class'=>'mt-5', 'files' => true
]) !!} {{ csrf_field() }}

<div class="form-group">
    {!! Form::label('title', 'Title:') !!} {!! Form::text('title', $post->title ,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!} {!! Form::select('category_id', $categories, $post->category->id ,['class'
    => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('photo_id', 'Photo:') !!} {!! Form::file('photo_id', null ,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Desc:') !!} {!! Form::textarea('body', $post->body ,['class' => 'form-control', 'rows'=>3]) !!}
</div>
    @include('includes.form_error')


<button type="submit" class="btn btn-outline-primary btn-block">Submit</button> {!! Form::close() !!}

<div style="margin-top: 20px">
    {!! Form::open(['method' => 'delete', 'action' => ['AdminPostsController@destroy',$post->id], 'class'=>'']) !!} {{ csrf_field()
    }}

    <button type="submit" class="btn btn-danger btn-block">Delete</button> {!! Form::close() !!}
</div>
@endsection