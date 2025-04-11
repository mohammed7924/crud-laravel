<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

    class ProductController extends Controller
    {
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Product::query();

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'price'       => 'required',
            'category_id' => 'required',
            'images.*'    => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::create($request->only(
            'name',
            'price',
            'description',
            'category_id'
        ));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->store('products', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => $filename,
                ]);
            }
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product    = Product::with('images')->findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric',
            'category_id' => 'required',
            'images.*'    => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product->update($request->only('name', 'price', 'description', 'category_id'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->store('products', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => $filename,
                ]);
            }
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        foreach ($product->images as $img) {
            Storage::disk('public')->delete($img->image);
            $img->delete();
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function show(Product $product)
    {
        $product->load('category', 'images');
        return view('products.show', compact('product'));
    }

    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);

        Storage::disk('public')->delete($image->image);
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}
