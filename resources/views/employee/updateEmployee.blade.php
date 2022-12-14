@extends('layout.welcome');
@section('content')
<div class="card">
    <div class="card-header">Update Employee</div>
    <div class="card-body">
        <form method="post" action="{{route('update-employee', [$employeeList->id])}}">
            @csrf
            <div class="form-group">
                <label for="employee">employee Name</label>
                <input type="text" name="name" class="form-control" id="role" placeholder="Enter name" value="{{$employeeList->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="employee">employee email</label>
                <input type="email" name="email" class="form-control" id="role" placeholder="Enter email" value="{{$employeeList->email}}">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="employee">employee Phone No.</label>
                <input type="number" maxlength="10" name="phone_no" class="form-control" id="role" placeholder="Enter role" value="{{$employeeList->phone_no}}">
                @error('phone_no')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="employee">Select Roll</label>
                <select name="role_id" id="" class="form-control">
                    <option value="">--Select--</option>
                    @foreach($roleList as $role)
                    <option value="{{$role->id}}" {{$role->id == $employeeList->role_id ? 'selected' : ''}}>{{$role->name}}</option>
                    @endforeach
                </select>
                
                @error('role_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="employee">Employee Status</label>
                <select name="status" id="" class="form-control">
                    <option value="">--Select--</option>
                    <option value="1" {{$employeeList->role_id == 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{$employeeList->role_id == 0 ? 'selected' : ''}}>Inactive</option>
                </select>
                
                @error('status')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@stop