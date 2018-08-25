@extends('layouts.admin')
@section('content')
<h1>Comments for <h3>{{$post->title}}</h3></h1>

@if (Session::has('deleted_comment'))
<p>{{session('deleted_comment')}}</p>
@endif @if (count($comments) > 0)

<div class="col-sm6">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">User</th>
                <th scope="col">Photo</th>
                <th scope="col">Email</th>
                <th scope="col">Body</th>
                <th scope="col">Create</th>
                <th scope="col">View Post</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            @if($comments) @foreach($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->user->name}}</td>
                <td><img height="50" src="{!! URL::asset($comment->user->photo ? $comment->user->photo->file : 'https://via.placeholder.com/400x400') !!}"></td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->body}}</td>
                <td>{{$comment->created_at->diffForHumans()}}</td>
                <td><a href="{{route('post.home',$comment->post->id)}}">Link to post</a></td>
                <td>
                    {!! Form::open(['method' => 'delete', 'action' => ['PostCommentsController@destroy',$comment->id], 'class'=>'mt-5', 'files'
                    => true ]) !!} {{ csrf_field() }}

                    <input type="submit" value="Delete" name="delete" class="btn btn-danger"> {!! Form::close() !!}


                </td>
            </tr>
            @endforeach @endif

        </tbody>
    </table>



</div>
<div class="col-sm6">

</div>

@else
<h1 class="text-center">No comments</h1>
@endif
@endsection
