<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
class UsersController extends Controller
{
  public function __construct() {
    $this->middleware(['role:super_admin|admin']);
  }

  public function index() {

    $users = User::all();

    return view('users.index', compact('users'));
  }

  public function edit(User $user) {
    if(auth()->user()->hasRole('super_admin')) {
      $roles = Role::all();
    } else {
      $roles = Role::where('name', '!=', 'super_admin')->get();
    }
    $permissions = Permission::all();
    return view('users.edit', compact('user', 'roles', 'permissions'));
  }

  public function update(Request $request, User $user) {
    if (!auth()->user()->hasRole('admin|super_admin')) {
      return back();
    } 
    $request->validate([
      'name' => ['required'],
      'roles' => ['required', 'array', 'min:1'],
      'permissions' => ['array'],
    ]);
    $requestData = $request->except('email');
    $user->update($requestData);
    $user->syncRoles($request->roles);
    if($request->permissions == null) {
      $user->syncPermissions();
    }else {
      $user->syncPermissions($request->permissions);
    }
    
    return redirect()->route('users.index');
  }

  public function create() {
    if(auth()->user()->hasRole('super_admin')) {
      $roles = Role::all();
    } else {
      $roles = Role::where('name', '!=', 'super_admin')->get();
    }
    $permissions = Permission::all();
    return view('users.create', compact('roles', 'permissions'));
  }

  public function store(Request $request, User $user) {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8'],
      'roles' => ['required', 'array', 'min:1'],
      'permissions' => ['array'],
    ]);
    
    $requestData = $request->all();
    $user = User::create($requestData);
    $user->syncRoles($request->roles);
    if($request->permissions) {
      $user->syncPermissions($request->permissions);
    }
    
    return redirect()->route('users.index');
  }
}
