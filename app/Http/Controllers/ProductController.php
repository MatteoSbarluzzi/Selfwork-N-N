<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest; 
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $img = null;

        if ($request->hasFile('img')) {
            $img = $request->file('img')->store('img', 'public');
        }

        Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'img' => $img,
        ]);

        return redirect()->back()->with('message', 'Prodotto inserito');
    }

    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }
}
