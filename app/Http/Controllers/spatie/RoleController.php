<?php

namespace App\Http\Controllers\spatie;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index() {
        return view('roles.index', ['roles' => Role::all()]);
    }

    public function create() {
        return view('roles.create', ['permissions' => Permission::all()]);
    }

    public function store(RoleStoreRequest $request) {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function edit(Role $role) {
        return view('roles.edit', ['role' => $role, 'permissions' => Permission::all()]);
    }

    public function update(RoleUpdateRequest $request, Role $role) {
        try {
            $role->update(['name' => $request->name]);
            $role->syncPermissions($request->permissions);

            return redirect()->route('roles.index')->with('success', 'Role updated successfully');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function destroy(Role $role) {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }
}
