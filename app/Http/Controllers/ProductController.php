<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::all(); 
        return view('product.index', ['products' => $products]);
    }

   
    public function store(Request $request)
    {
      
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0'
        ]);

       
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

  
        return redirect()->route('product.index')->with('success', 'Prodotto creato con successo!');
    }
}
