@extends('layout.welcome');
@section('content')
<div class="card">
    <div class="card-header">Add Role</div>
    <div class="card-body">
        <form method="post" action="{{route('add-role')}}">
            @csrf
            <div class="form-group">
                <label for="role">Role Name</label>
                <input type="text" name="name" class="form-control" id="role" placeholder="Enter role">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@stop