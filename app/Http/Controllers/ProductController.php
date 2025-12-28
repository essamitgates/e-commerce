<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        // $result = Product::paginate(5)->get();
        // $result = Product::get();
        $result = Product::with('category')->get();
        return view('product.productTable', ['products' => $result]);
    }
    public function show($productId)
    {
        // get product and its photos
        $result = Product::with('photos')->where('id', $productId)->get();

        return view('product.show', ['products' => $result]);
    }
    public function searchProduct(Request $request)
    {

        $searchKey  = $request->input('searchKey') ?? '';
        if ($request) {
            $result = Product::where('name', 'like', '%' . $searchKey  . '%')->get();
        }
        return view('product.show', ['products' => $result]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('product.create', ['categories' => $categories]);
    }
    public function store()
    {
        // dd(request()->all());
        // Validate the request data
        request()->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|integer|exists:categories,id',
            'imagepath' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',

        ]);
        Product::create([
            'name' => request('name'),
            'description' => request('description'),
            'category_id' => request('category_id'),
            'imagepath' => request('imagepath'),
            'price' => request('price'),
        ]);
        $productId = Product::latest()->first()->id;

        // store Product Photos
        if (request()->hasFile('photo_url')) {

            $photos = request()->file('photo_url');
            foreach ($photos as $photo) {
                $path = $photo->store('product_photos', 'public');
                ProductPhoto::create([
                    'product_id' => $productId,
                    'photo_url' => $path,
                ]);
            }
        }

        return redirect('/product/create');
    }
    public function edit($productId)
    {
        $product = Product::where('id', $productId)->firstOrFail();
        return view('product.edit', ['product' => $product]);
    }
    public function update($productId)
    {
        Product::where('id', $productId)->update([
            'name' => request('name'),
            'description' => request('description'),
            'imagepath' => request('imagepath'),
            'price' => request('price'),
        ]);
        return redirect('/product');
    }



    public function destroy($productId)
    {
        Product::where('id', $productId)->delete();
        return redirect('/product');
    }
}
