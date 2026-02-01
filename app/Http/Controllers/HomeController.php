<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
       $products = Product::when($request->search,function($query)use($request){
            return $query->whereAny([
                'name',
                'price'
            ],'like','%'.$request->search.'%');
        })->get();
        $categories = Category::all();
        return view('home', compact('products', 'categories'));
    }
}
