<?php

namespace App\Http\Controllers;

use App\Models\Utilasateures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view("auth.register");
    }
    public function store(Request $request){

        Utilasateures::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route("login.index");
    }
}
