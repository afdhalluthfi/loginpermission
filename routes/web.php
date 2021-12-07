<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{PermissionController,UserController,AssignController,RoleController};
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $role=Role::first();
    // $role->givePermissionTo('create post');
    // $Role =Role::get();
    // $hasRole=auth()->user()->hasAnyRole($Role);
    return view('welcome');
    // dd($hasRole);
});

Route::middleware(['has.role'])->prefix('admin')->group(function () {
    Route::get('dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('role-and-permission')->namespace('permission')->group(function(){
        Route::prefix('role')->group(function(){
            Route::get('',[RoleController::class,'index'])->name('role.index');
            Route::post('create',[RoleController::class, 'store'])->name('role.create');
            Route::get('{role}/edit',[RoleController::class,'edit'])->name('role.edit');
            Route::put('{role}/edit',[RoleController::class,'update']);
        });
         Route::prefix('permission')->group(function(){
             Route::get('',[PermissionController::class,'index'])->name('permission.index');
             Route::post('create',[PermissionController::class,'store'])->name('permission.create');
             Route::get('{permission}/edit',[PermissionController::class,'edit'])->name('permission.edit');
             Route::put('{permission}/edit',[PermissionController::class,'update'])->name('permission.update');
         });
         Route::prefix('assign')->group(function(){
            Route::get('',[AssignController::class,'index'])->name('assign.index');
            Route::post('create',[AssignController::class,'store'])->name('assign.create');
            Route::get('{role}/edit',[AssignController::class,'edit'])->name('assign.edit');
            Route::put('{role}/edit',[AssignController::class,'update']);
         });
         Route::prefix('user')->group(function(){
             Route::get('',[UserController::class,'index'])->name('user.index');
             Route::post('create',[UserController::class,'store'])->name('user.create');
             Route::get('{user}/edit',[UserController::class,'edit'])->name('user.edit');
             Route::put('{user}/edit',[UserController::class,'update']);
            
         });

        });
});
/*
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', function() {
            return view('dashboard');
        });
    }); 
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
