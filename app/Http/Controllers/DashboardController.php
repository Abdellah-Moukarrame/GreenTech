<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
class DashboardController extends Controller
{


    public function index()
    {
        $products = Product::paginate(5);
        // var_dump($products);
        // dd($products);
        $categories = Category::all();
        return view ('admin.dashboard',compact('products','categories'));
    }
}
