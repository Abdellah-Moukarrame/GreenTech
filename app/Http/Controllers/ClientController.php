<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Favorites;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {

        $products = Product::all();
        $categories = Category::all();
        $favorites = Favorites::all();
        return view('client.clientdash', compact('products', 'categories','favorites'));
    }
}
