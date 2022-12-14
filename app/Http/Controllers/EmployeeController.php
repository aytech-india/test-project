<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {   
        $employees = Employee::paginate(10);
        $roles = Role::all()->toArray();
        /* $roleData = [];
        foreach ($roles as $key => $role) {
            $roleData[$role['id']] = $role['name'];
        } */
        return view('employee.employee', ['employeeList' => $employees]);
    }

    public function addEmployee(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'phone_no' => 'required|max:10|min:10',
                    'role_id' => 'required',
                    'status' => 'required',
                ]
            );
            $data = $request->only('name', 'email', 'phone_no', 'role_id', 'status');
            $employee = Employee::create($data);
            if ($employee) {
                return redirect()->route('employee');
            }
        }

        return view('employee.addEmployee', ['roleList' => Role::all()]);
    }

    public function updateEmployee(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required',
                    'phone_no' => 'required',
                    'role_id' => 'required',
                    'status' => 'required',
                ]
            );
            $data = $request->only('name', 'email', 'phone_no', 'role_id', 'status');
            $employee = Employee::where('id', $id)->update($data);
            if ($employee) {
                return redirect()->route('employee');
            }
        }
        $empList = Employee::where('id', $id)-> get()[0];
        return view('employee.updateEmployee', ['roleList' => Role::all(), 'employeeList' => $empList]);
    }

    public function deleteEmployee(Request $request, $id)
    {
        $delete = Employee::where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('employee');
        }
    }
}
