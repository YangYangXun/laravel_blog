@extends('layouts.admin')
@section('content')


@if (Session::has('deleted_reply'))
<p>{{session('deleted_reply')}}</p>
@endif @if (count($replies) > 0)

<div class="col-sm6">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Author</th>
                <th scope="col">Photo</th>
                <th scope="col">Email</th>
                <th scope="col">Body</th>
                <th scope="col">Create</th>
                <th scope="col">Link to post</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            @if($replies) @foreach($replies as $reply)
            <tr>
                <td>{{$reply->id}}</td>
                <td>{{$reply->author}}</td>
                <td><img height="50" src="{!! URL::asset($reply->comment->user->photo ? $reply->comment->user->photo->file : 'https://via.placeholder.com/400x400') !!}"></td>
                <td>{{$reply->email}}</td>
                <td>{{$reply->body}}</td>
                <td>{{$reply->created_at->diffForHumans()}}</td>
                <td><a href="{{route('post.home',$reply->comment->post->id)}}">Link to post</a></td>
                <td>
                    {!! Form::open(['method' => 'delete', 'action' => ['CommentRepliesController@destroy',$reply->id], 'class'=>'mt-5', 'files'
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
