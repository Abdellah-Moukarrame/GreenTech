<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MAnagePersmessionController extends Controller
{
    public function index(){
        return view('admin.permession_manage');
    }
}
