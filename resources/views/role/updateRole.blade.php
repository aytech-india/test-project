@extends('layout.welcome');
@section('content')
<div class="card">
    <div class="card-header">Update Role</div>
    <div class="card-body">
        <form method="post" action="{{route('update-role', [$role[0]->id])}}">
            @csrf
            <div class="form-group">
                <label for="role">Role Name</label>
                <input type="text" class="form-control" name="name" id="role" placeholder="Enter role" value="{{$role[0]->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@stop