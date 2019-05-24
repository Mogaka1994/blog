@extends('layouts.app')
@section('content')
<table class="table table-hover">
    <thead>
        <th>Image</th>
        <th>Title</th>
        <th>Edit</th>
        <th>Thrash</th>
    </thead>
    <tbody>
    @if($posts->count()>0)
    @foreach($posts as $post)
    <tr>
        <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="50px" height="90px"></td>
        <td>{{$post->title}}</td>
        <td>Editing</td>
        <td><a href="{{route('post.delete',['id'=>$post->id])" class="btn btn-danger">Deleting</a></td>
    </tr>
    @endforeach
    @else
        <tr> 
            <th colspan="5" class="text-danger">No published Post </th>
        </tr>
        @endif
    </tbody>
</table>
@stop