<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('products/Index', [
            'products' => Product::with('categories')->latest()->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('products/Create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        $product = Product::create(['name' => $data['name']]);
        $product->categories()->sync($data['categories']);

        return redirect()->route('products.index');
    }
    public function edit(Product $product)
    {
        return Inertia::render('products/Edit', [
            'product' => $product->load('categories'),
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        $product->update(['name' => $data['name']]);
        $product->categories()->sync($data['categories']);

        return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
