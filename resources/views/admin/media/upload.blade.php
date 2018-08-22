@extends('layouts.admin') 
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection
 
@section('content')
<h1>Media upload</h1>

{!! Form::open(['method' => 'post', 'action' => 'AdminMediasController@store', 'class'=>['mt-5','dropzone'], 'files' => true
]) !!} {{ csrf_field()}} {!! Form::close() !!}
@endsection
 
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection