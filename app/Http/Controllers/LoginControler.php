<?php

namespace App\Http\Controllers;

use App\Models\Utilasateures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginControler extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        // $request->validate([
        //     'email'=>"required|email",
        //     'password'=>"required| max:10",
        // ]);
        $user = Utilasateures::where('email',$request->email)->first();

        if ($user && Hash::check($request->password,$user->password)) {
            Auth::login($user);
            if($user->role=='admin'){
                return redirect()->route('admin.dashboard');
            }
            else if ($user->role == 'client') {
                return redirect()->route('client');
            }
            else {
                return redirect()->route('/');
            }
        }
        else{
            back();
        }
    }
}
