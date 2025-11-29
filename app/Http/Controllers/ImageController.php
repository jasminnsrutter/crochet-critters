<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::with('product')->get();
        return view('images.index', compact('images'));
    }

    public function create()
    {
        $products = Product::all();
        return view('images.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'url' => 'required|string',
        ]);

        Image::create($validated);
        return redirect()->route('images.index')->with('success', 'Image created!');
    }

    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    public function edit(Image $image)
    {
        $products = Product::all();
        return view('images.edit', compact('image', 'products'));
    }

    public function update(Request $request, Image $image)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'url' => 'required|string',
        ]);

        $image->update($validated);
        return redirect()->route('images.index')->with('success', 'Image updated!');
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return redirect()->route('images.index')->with('success', 'Image deleted!');
    }
}
