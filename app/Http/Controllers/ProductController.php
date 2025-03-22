<?php

// Percorso: app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('img', 'public');
        } else {
            $data['img'] = 'img/default.jpg';
        }

        Product::create($data);

        return redirect()->route('product.index')->with('message', 'Prodotto creato con successo!');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            if ($product->img && $product->img !== 'img/default.jpg') {
                Storage::disk('public')->delete($product->img);
            }
            $data['img'] = $request->file('img')->store('img', 'public');
        }

        $product->update($data);

        return redirect()->route('product.index')->with('message', 'Prodotto aggiornato con successo!');
    }

    public function destroy(Product $product)
    {
        if ($product->img && $product->img !== 'img/default.jpg') {
            Storage::disk('public')->delete($product->img);
        }

        $product->delete();

        return redirect()->route('product.index')->with('message', 'Prodotto eliminato con successo!');
    }
}
