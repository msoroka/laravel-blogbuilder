<?php

namespace App\Handlers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleHandler
{
    public function getAllRoles()
    {
        return Role::all();
    }

    public function getAllPermissions()
    {
        return Permission::all();
    }

    public function editRole($id)
    {
        return Role::find($id);
    }

    public function storeRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slug' => 'required|string|unique:roles',
            'name' => 'required|string|unique:roles',
        ]);

        $data = $request->only([
            'slug',
            'name',
        ]);

        if ($validator->fails()) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $role = Role::create($data);

        if (!$role) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $role->permissions()->sync($request->permissions);

        flash('Success')->success();

        return redirect()->route('admin.role.list-roles');
    }

    public function updateRole(Request $request, $id)
    {
        $role = Role::find($id);

        $validator = Validator::make($request->all(), [
            'slug' => 'required|string|unique:roles,slug,' . $role->id . ',id',
            'name' => 'required|string|unique:roles,name,' . $role->id . ',id',
        ]);

        $data = $request->only([
            'slug',
            'name',
        ]);

        if ($validator->fails()) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        if (!$role) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $role->permissions()->sync($request->permissions);
        $role = $role->update($data);

        flash('Success')->success();

        return redirect()->route('admin.role.list-roles');
    }

    public function removeRole($id)
    {
        $role = Role::find($id);

        if ($role->delete()) {
            flash('Success')->success();

            return redirect()->route('admin.role.list-roles');
        }

        flash('Sorry, someting went wrong. Please try again.')->error();

        return redirect()->route('admin.role.list-roles');
    }
}
