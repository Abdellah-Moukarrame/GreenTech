<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class MAnagePersmessionController extends Controller
{
    public function index(){
        $permessions = Permission::all();
        return view('admin.createrole',compact('permessions'));
    }
}
