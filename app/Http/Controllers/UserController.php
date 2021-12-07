<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //

    public function index ()
    {   
        $role=Role::get();
        $users= User::has('roles')->get();
        // dd($users);
        return view('permission.user.index',compact('role','users'));
    }


    public function store () 
    {
        $role=request('role');
        $user=User::where('email',request('email'))->first();
        $user->assignRole($role);
        return back();
        // dd($user);
    }

    public function edit (User $user) {
        $roles = Role::get();
        $users = User::has('roles')->get();

        return view('permission.user.edit',compact('user','roles','users'));
    }


    public function update (User $user)
    {
        $user->syncRoles(request('role'));

        return redirect()->route('user.index')->with('success','berhasil di ubah');
    }

}
