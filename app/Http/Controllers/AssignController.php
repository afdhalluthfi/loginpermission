<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AssignController extends Controller
{
    // 
    public function index () 
    {
        $role =Role::get();
        $permission=Permission::get();
        return view('permission.assign.index',compact('role','permission'));
    }

    public function store (Request $request) 
    {
        $request->validate([
            'role' => 'required',
            'permission' => 'required|array'
        ]);
        // dd($request->permission);
        $role=Role::find($request->role);
        $role->givePermissionTo($request->permission);
        return back()->with('success',"berhasil di assigment {{$role->name}}");
    } 

    public function edit (Role $role) {
        
        return view('permission.assign.edit',[
            'role'=>$role,
            // 'roles'=>Role::get(),
            'permission'=>Permission::get()
        ]);
    }

    public function update (Role $role) {
       request()->validate([
           'role'=>'required',
           'permission'=>'required|array'

       ]);

       $role->syncPermissions(request('permission'));
       return redirect()->route('assign.index')->with('success','berhasil di ubah');
    }
}
