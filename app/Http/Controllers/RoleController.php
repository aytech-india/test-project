<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('role.role', ['roleList' => Role::paginate(10)]);
    }

    public function addRole(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate(
                [
                    'name' => 'required'
                ]
            );

            $role = new Role();
            $role->name = $request->name;
            if ($role->save()) {
                return redirect()->route('role');
            }
        }

        return view('role.addRole');
    }

    public function updateRole(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $request->validate(
                [
                    'name' => 'required'
                ]
            );

            $role = Role::where('id', $id)->update(['name' => $request->name]);
            if ($role) {
                return redirect()->route('role');
            }
        }

        return view('role.updateRole', ['role' => Role::where('id', $id)->get()]);
    }

    public function deleteRole(Request $request, $id)
    {
        $delete = Role::where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('role');
        }
    }
}
