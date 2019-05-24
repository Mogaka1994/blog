
@extends('layouts.app')

@section('content')
@include('admin.includes.errors')

<div class="panel panel-default">
  <div class="panel-heading">Edit your profile</div>
  <div class="panel-body">
    <form action="{{ route('user.profile.update')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Username</label>
          <input type="text" name="name" value="{{$user->name}}"class="form-control">
        </div>
        <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control">
        </div>
        <div class="form-group">
                <label for="email">New Password</label>
                <input type="password" name="password"  class="form-control">
        </div>
        <div class="form-group">
                <label for="email">Upload New Avatar</label>
                <input type="file" name="avatar"  class="form-control">
        </div>
        <div class="form-group">
                <label for="email">Facebook Profile</label>
                <input type="email" name="facebook"  value="{{$user->profile->facebook}}"class="form-control">
        </div>
        <div class="form-group">
                <label for="email">Youtube Profile</label>
                <input type="email" name="youtube"value=" {{$user->profile->youtube}}" class="form-control">
        </div>
        <div class="form-group">
                <label for="about">About</label>
                <textarea name="about" id="about" cols="5" rows="5"value=" {{$user->profile->about}}" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <div class="text-center">
            <button class="btn btn-success" type="submit">Add User</button>
          </div>
        </div>
    </form>
  </div>
</div>
@stop
@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop
@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
  <script>
    $(document).ready(function() {
      $('#tag').summernote();
  });
  </script>
@stop
