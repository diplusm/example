<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.product_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|string|max:1024',
            'quantity' => 'required|integer',
            'price' => 'required|decimal:2',
        ]);

        $data['article'] = 'PRD-' . strtoupper(uniqid());

        Product::create($data);

        return redirect(route('product'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('products.product_edit', ['product' => Product::first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|string|max:1024',
            'quantity' => 'required|integer',
            'price' => 'required|decimal:2',
        ]);

        $product->update($data);

        return redirect(route('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product'));
    }
}
