@extends('layouts.admin') 
@section('content')
<h1>Media index</h1>


<div class="col-sm6">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Url</th>
                <th scope="col">Photo</th>
                <th scope="col">Create</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            @if($photos) @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td>{{$photo->file}}</td>
                <td><img height="70" src="{!! URL::asset($photo->file) !!}"></td>
                <td>{{$photo->created_at->diffForHumans()}}</td>
                <td>{{$photo->updated_at->diffForHumans()}}</td>
                <td>
                    {!! Form::open(['method' => 'delete', 'action' => ['AdminMediasController@destroy',$photo->id], 'class'=>'mt-5', 'files'
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
@endsection