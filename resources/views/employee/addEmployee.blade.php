@extends('layout.welcome');
@section('content')
<div class="card">
    <div class="card-header">Add Employee</div>
    <div class="card-body">
        <form method="post" action="{{route('add-employee')}}">
            @csrf
            <div class="form-group">
                <label for="employee">employee Name</label>
                <input type="text" name="name" class="form-control" id="role" placeholder="Enter name">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="employee">employee email</label>
                <input type="email" name="email" class="form-control" id="role" placeholder="Enter email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="employee">employee Phone No.</label>
                <input type="number" maxlength="10" name="phone_no" class="form-control" id="role" placeholder="Enter role">
                @error('phone_no')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="employee">Select Roll</label>
                <select name="role_id" id="" class="form-control">
                    <option value="">--Select--</option>
                    @foreach($roleList as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
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
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                
                @error('status')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@stop