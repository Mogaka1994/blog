@extends('layouts.app')
@section('content')
<table class="table table-hover">
    <thead>
        <th>Image</th>
        <th>Title</th>
        <th>Delete</th>
        <th>Restore</th>
    </thead>
    <tbody>
    @if($posts->count()>0)
    @foreach($posts as $post)
    <tr>
        <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="50px" height="90px"></td>
        <td>{{$post->title}}</td>
        <td>Delete</td>
        <td><a href="{{route('post.restore',['id'=>$post->id])" class="btn btn-xs btn-success">Restore</a></td>
        <td><a href="{{route('post.kill',['id'=>$post->id])" class="btn btn-xs btn-success">Destroy</a></td>
    </tr>
    @endforeach
    @else
        <tr> 
            <th colspan="5" class="text-center">No Trashed Posts</th>
        </tr>
    @endif
    </tbody>
</table>
@stop