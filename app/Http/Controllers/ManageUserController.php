<?php

namespace App\Http\Controllers;

use App\Models\Utilasateures;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index(){
        $users = Utilasateures::where('email','!=','admin@admin.com')->paginate(5);
        return view('admin.usermanagement',compact('users'));
    }
}
