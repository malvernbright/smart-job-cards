<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['Super-Admin','admin'])->get();
        return view("admin.roles.index", compact("roles"));
    }

    public function show(Role $role)
    {
        return view("admin.roles.show", compact("role"));
    }

    public function create()
    {
        return view("admin.roles.create");
    }
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);
        role::create($validated);
        return to_route('admin.roles.index')->with('message', 'Role created successfully!');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, role $role)
    {
        $validated = $request->validate(['name' => 'required']);
        $role->update($validated);
        return to_route('admin.roles.index')->with('message', 'Role updated successfully!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('message','Role deleted!');
    }

    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission already exists');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added!');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked!');
        }
        return back()->with('message', 'Permission does not exist!');
    }
}
