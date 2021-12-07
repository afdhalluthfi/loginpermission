<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //

    public function index () {
        $permissions =Permission::get();
        $permission =new Permission;
        return view('permission.permissions.index',compact('permissions','permission'));
        // dd($permission);
    }
    public function store(Request $request)
    {
        // dd($request->name);
        $request->validate([
            'name' => 'required'
        ]);

        Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? 'web'
        ]);

        return back();
    }
    public function edit(Permission $permission)
    {

        return view('permission.permissions.edit', [
            'permission' => $permission,
            'submit' => 'update'
        ]);
    }

    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required'
        ]);

        $permission->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web'
        ]);
        return redirect()->route('permission.index');
    }
}
