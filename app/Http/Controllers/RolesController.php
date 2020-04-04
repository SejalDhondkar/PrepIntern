<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return $roles;
    }

    public function store(Request $request)
    {
        $roles = new Role;
        $roles->title = $request->title;
        $roles->description = $request->description;
        $roles->save();

        $success = 'success';
        return $success;
    }

    public function edit(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        return $role;
    }

    public function update(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $role->title = $request->title;
        $role->description = $request->description;
        $role->update();

        $success = 'success';
        return $success;

    }

    public function delete(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        $success = 'success';
        return $success;

    }

}
