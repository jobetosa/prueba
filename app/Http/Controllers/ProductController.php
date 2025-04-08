<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric'
        ]);
        Product::create($request->only('name', 'description', 'price'));
        return redirect()->back()->with('success', 'Producto creado con éxito');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->back()->with('success', 'Producto eliminado');
    }
}
