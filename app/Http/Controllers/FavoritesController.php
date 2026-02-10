<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorites;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $favorites = Favorites::all()->where('user_id',Auth::user()->id);
        return view('client.favorites',compact('favorites','products','categories'));

    }
    public function create(Request $request)
    {
        Favorites::create(
            [
                "user_id"=>Auth::user()->id,
                "product_id"=>$request->product_id
            ]
        );
        return redirect()->route('client.favorites');
    }
}
