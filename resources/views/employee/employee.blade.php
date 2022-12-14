@extends('layout.welcome');
@section('content')
<div class="card">
    <div class="card-header">Role List</div>
    <div class="card-body">
        <a href="{{route('add-employee')}}" class="btn btn-primary">Add Emloyee</a>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Employee Email</th>
                    <th scope="col">Employee Phone No.</th>
                    <th scope="col">Employee Role</th>
                    <th scope="col">Employee Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employeeList as $employee)
                <tr>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone_no}}</td>
                    <td>{{$employee->role_id}}</td>
                    <td>{{$employee->status ? 'Active' :'Inctive'}}</td>
                    <td>{{$employee->created_at}}</td>
                    <td>
                        <a href="{{route('delete-employee', [$employee->id])}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('update-employee', [$employee->id])}}" class="btn btn-primary">Update</a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {{$employeeList->links() }}
    </div>
</div>
@stop