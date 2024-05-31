<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::latest()->paginate()
        ]);
    }

    public function create()
    {
        return view('products.create', ['categories' => Category::all()]);
    }

    public function store(ProductRequest $request) 
    { 
        try {

            // $image = $request->hasFile('image') ? $request->file()->store('public', 'products') : '';

            // upload image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
    
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'image' => $imageName,
            ]);
    
            return back()->with('success', 'Product created successfully.');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function edit($id) 
    {
        $product = Product::findOrFail($id);

        return view('products.edit', ['product' => $product, 'categories' => Category::all()]);
    }

    public function update(UpdateRequest $request, $id) {
        try {

            $product = Product::findOrFail($id);

            if(isset($request->image)) {
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('products'), $imageName);
                $product->image = $imageName;
            }

            $product->name = $request->name;
            $product->description = $request->description;
            $product->category_id = $request->category_id;

            $product->save();
    
            return back()->with('success', 'Product updated successfully.');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return back()->with('success', 'Product deleted successfully.');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function show($id) {
        $product = Product::findOrFail($id);

        return view('products.show', ['product' => $product]);
    }
}
