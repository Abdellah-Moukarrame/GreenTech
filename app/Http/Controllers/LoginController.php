<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    public function index()
    {
        return View("auth.login");
    }

    public function login(Request $request)
    {
        $check = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        // dd($check);
        if ($check) {
            if (Auth::user()->role == "client") {
                return redirect()->route('client');
                // dd($check);
            } else if (Auth::user()->role == "admin") {
                return redirect()->route('admin');
                dd($check);
            } else {
                return redirect()->route('home');
            }



            // dashbaord based on role
        } else {
            // redirect back to login
            return redirect()->back()->with("error", "Email or Password Incorrect");
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login.index');
    }
}
