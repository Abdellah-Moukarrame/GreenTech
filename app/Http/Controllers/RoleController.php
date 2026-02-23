<?php

namespace App\Http\Controllers;

// use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.listroles',compact('roles'));
    }
    public function create() {
        $permessions = Permission::all();
        return view('admin.createrole',compact('permessions'));
    }
    public function store(Request $request){

        $role=Role::create([
            'name'=>$request->name,
            'guard_name'=>'web',
        ]);

        $role->syncPermissions($request->permissions);
        return redirect()->route('roles');
    }
    public function edit($id){
        $role = Role::findOrFail($id);
        $permessions = Permission::all();
        return view('admin.editrole',compact('role','permessions'));
    }
    public function update(Request $request ,$id){
        $role=Role::findOrFail($id);
        $role->update([
            'name'=>$request->name,
        ]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles');
    }
    public function destroy($id){
        $role=Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles');
    }
}
