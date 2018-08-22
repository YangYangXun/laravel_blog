@extends('layouts.admin')
@section('content')
<h1>Posts Edit</h1>


<h2>Edit-> {{$post->title}}</h2>


<div class="col-sm-4">
            <img style="width: 400px" class="image-responsive image-rounded" src="{!! URL::asset($post->photo ? $post->photo->file : 'https://via.placeholder.com/400x400') !!}" >
</div>

  <div class="col-sm-8">
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
</div>
@endsection
