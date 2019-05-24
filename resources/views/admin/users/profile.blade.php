@extends('layouts.app')
@section('content')
<div class="panel panel-default">
<div clas="panel panel-heading">Edit Your Profile</div>
<table class="table table-hover">
    <thead>
        <th>Image</th>
        <th>Name</th>
        <th>Permission</th>
        <th>Delete</th>
    </thead>
    <tbody>
    @if($users->count()>=0)
        @foreach($users  as $user)
        <tr>
<td>
<img src="" alt="" width="60px" height="60px" style="border-radius:50%">
{{--  {{asset($user->profile->avatar)}}  --}}
</td>
<td>
    {{$user->name}}
</td>
<td>
  @if($user->admin)
  <a href="{{route('user.not.admin',['id'=>$user->id])}}" class="btn btn-xs btn-danger">Make permissions</a>
  @else
  <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-xs btn-success">Make admin</a>
  @endif
  </td>
<td>
@if(Auth::id()!==$user->id)
<a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-danger">Delete</a>
@endif
</td>

        </tr>
        @endforeach
         <tr>
            <td colspan="5" class="text-center">No users</td>
        </tr>
        @endif
    </tbody>
</table>
</div>


@stop
