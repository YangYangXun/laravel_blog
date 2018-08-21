@extends('layouts.admin')
@section('content')
<h1>Posts</h1>
  @if (Session::has('deleted_post'))

     <p>{{session('deleted_post')}}</p>

  @endif



<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">User</th>
            <th scope="col">User Photo</th>
            <th scope="col">Categroy</th>
            <th scope="col">Post Photo</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
    </thead>
    <tbody>

        @if($posts) @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->user->name}}</td>
            <td><img height="50" src="{!! URL::asset($post->user->photo->file) !!}"></td>
            <td>{{$post->category ? $post->category->name : 'no category'}}</td>
            <td><img height="50" src="{!! URL::asset($post->photo->file) !!}"></td>
            <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
            <td>{{str_limit($post->body,20)}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach @endif

    </tbody>
</table>
@endsection
