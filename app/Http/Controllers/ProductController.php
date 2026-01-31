<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('home', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => "required|string|max:255",
            'description' => "required|string",
            'price' => "required|integer",
            'category' => "required|integer"
        ]);
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category
        ]);
        return redirect()->route("admin.dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.update', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        $product = Product::findOrFail($id);
        // $request->validate(
        //     [
        //         'name' => "required|string|max:255",
        //         'description' => "required|string",
        //         'price' => "required|integer",
        //         'category' => "required|integer"
        //     ]
        // );
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category
        ]);

        $product->save();
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product,$id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.dashboard');

    }
}
