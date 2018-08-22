@extends('layouts.admin') 
@section('content')
<h1>Admin category index</h1>


<div class="col-sm6">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Categroy Name</th>
                <th scope="col">Create</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>

            @if($categories) @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
                <td>{{$category->created_at->diffForHumans()}}</td>
                <td>{{$category->updated_at->diffForHumans()}}</td>
            </tr>
            @endforeach @endif

        </tbody>
    </table>



</div>
<div class="col-sm6">

</div>
@endsection