<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::latest()->paginate()
        ]);
    }

    public function create() {
        return view('categories.create');
    }

    public function store() {
        try {
            Category::create([
                'name' => request('name'),
                'description' => request('description')
            ]);

            return back()->with('success', 'Category created successfully.');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function edit($id) {
        $category = Category::findOrFail($id);

        return view('categories.edit', ['category' => $category]);
    }

    public function update($id) {
        try {
            $category = Category::findOrFail($id);

            $category->update([
                'name' => request('name'),
                'description' => request('description')
            ]);

            return back()->with('success', 'Category updated successfully.');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return back()->with('success', 'Category deleted successfully.');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function show($id) {
        $category = Category::findOrFail($id);

        return view('categories.show', ['category' => $category]);
    }
}
