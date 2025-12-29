<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function index()
    {
        //
        $result = Category::all();
        return view('category.show', ['categories' => $result]);
    }

    public function show($categoryId)
    {
        if ($categoryId) {
            $result = Product::where('category_id', $categoryId)->get();
        }
        return view('category.show', ['categories' => $result]);
    }

    public function create()
    {
        return view('category.create');
    }
    public function store()
    {
        // Validate the request data
        request()->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Category::create([
            'name' => request('name'),
            'description' => request('description'),
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }
}
