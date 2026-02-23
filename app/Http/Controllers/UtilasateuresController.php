<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Utilasateures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilasateuresController extends Controller
{
    public function index(){
        return view('admin.create_user');
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.create_user',compact('roles'));
    }
    public function store(Request $request)
    {
        Utilasateures::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route("admin");
    }
    public function edit($id){
        $roles = Role::all();
        $user= Utilasateures::findOrFail($id);
        return view('admin.update_user',compact('user','roles'));
    }
    public function update(Request $request ,$id) {
        $user = Utilasateures::findOrFail($id);

        $user->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password)
        ]);
        return redirect()->route("admin");

    }
    public function destroy($id) {
        $user = Utilasateures::findOrFail($id);
        $user->delete();
        return redirect()->route('users');
    }
}
