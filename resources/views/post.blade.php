@extends('layouts.blog-post') 
@section('content')


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$post->title}}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <img height="50" src="{!! URL::asset($post->user->photo->file) !!}">
                <a href="#">{{$post->user->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at}}</p>

            <hr>

            <!-- Preview Image -->
            <!-- <img class="img-responsive" src="http://placehold.it/900x300" alt=""> -->
            <img class="img-responsive" src="{!! URL::asset($post->photo->file) !!}">

            <hr>

            <!-- Post Content -->
            <p class="lead">{{$post->body}}</p>
            <p>Lorem ipsum dolor sitt, ati impeditum ab tempora </p>

            <hr>

            <!-- Blog Comments -->




            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                @if (Session::has('comment_message'))

                <p>{{session('comment_message')}}</p>

                @endif {!! Form::open(['method' => 'post', 'action' => 'PostCommentsController@store', 'class'=>'mt-5', 'files' => true ])
                !!} {{ csrf_field() }}

                <input type="hidden" name="post_id" value="{{$post->id}}">

                <div class="form-group">
                    {!! Form::textarea('body', null ,['class' => 'form-control','rows'=> '3']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('submit', null ,['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->

            @foreach ($comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                        <img class="media-object" height="50" src="{!! URL::asset($comment->user->photo->file)!!}" alt="">
                    </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->user->name}}
                        <small>{{$comment->created_at}}</small>
                    </h4>
                    {{$comment->body}}
                    <!-- Nested Comment -->

                    <!-- Reply form -->
                    @if (Session::has('reply_message'))

                    <p>{{session('reply_message')}}</p>

                    @endif

                    <p>Reply :</p>
                    {!! Form::open(['method' => 'post', 'action' => 'CommentRepliesController@createReply', 'class'=>'mt-5', 'files' => true
                    ]) !!} {{ csrf_field() }}
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">

                    <div class="form-group">
                        {!! Form::textarea('body', null ,['class' => 'form-control','rows'=> 1]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('submit', null ,['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}

                    <!-- End Reply form -->
                    @if (count($comment->replies) > 0) @foreach ($comment->replies as $reply)
                    <div class="media">
                        <a class="pull-left" href="#">
                                    <img class="media-object" height="50px" src="{!! URL::asset($reply->comment->user->photo->file)!!}" alt="">
                                </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at}}</small>
                            </h4>
                            {{$reply->body}}
                        </div>
                    </div>
                    @endforeach @endif
                    <!-- End Nested Comment -->
                </div>
            </div>
            @endforeach

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
                    in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia
                    congue felis in faucibus.
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
                            in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                            lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <div class="media">
                        <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
                            in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                            lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>

        </div>
@endsection