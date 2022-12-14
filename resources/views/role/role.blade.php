@extends('layout.welcome');
@section('content')
<div class="card">
    <div class="card-header">Role List</div>
    <div class="card-body">
        <a href="{{route('add-role')}}" class="btn btn-primary">Add Role</a>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Role Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roleList as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->created_at}}</td>
                    <td>
                        <a href="{{route('delete-role', [$role->id])}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('update-role', [$role->id])}}" class="btn btn-primary">Update</a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {{$roleList->links() }}
    </div>
</div>
@stop