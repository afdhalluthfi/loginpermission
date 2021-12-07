<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index () 
    {   
        $roles=Role::get();
        $role=new Role;
        return view('permission.role.index',compact('roles','role'));
    }

    public function store (Request $request) 
    {
        // dd($request->name);
         $request->validate([
            'name'=>'required'
        ]);

        Role::create([
            'name'=>$request->name,
            'guard_name'=>$request->guard_name ?? 'web'
        ]);

        return back();
    }

    public function edit (Role $role) {

        return view('permission.role.edit',[
            'role'=>$role,
            'submit'=>'update'
        ]);
    }

    public function update (Role $role) {
        request()->validate([
            'name'=>'required'
        ]);

        $role->update([
            'name' => request('name'),
            'guard_name'=>request('guard_name') ?? 'web'
        ]);
         return redirect()->route('role.index');
    }
}
