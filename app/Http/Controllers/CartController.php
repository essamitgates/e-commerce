<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index()
    {
        // Auth::user();

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        return view('Cart.show', compact('cartItems'));
    }

    public function create()
    {
        //
        return view('Cart.create');
    }

    public function show()
    {
        $user = Auth::user();
        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        // dd($cartItems);
        return view('Cart.show', compact('cartItems'));
    }

    public function store(Request $request)
    {
        //Auth User
        $user = Auth::user();
        if (Auth::check()) {
            $request->validate([
                'product_id' => 'required|integer|exists:products,id'
            ]);
            // Check if the product is already in the cart
            $existingCartItem = Cart::where('user_id', $user->id)
                ->where('product_id', $request->input('product_id'))
                ->first();
            if ($existingCartItem) {
                // If it exists, update the quantity
                $existingCartItem->increment('quantity');
            } else {
                Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $request->input('product_id'),
                    'quantity' => 1,
                ]);
            }
            // Create a new cart item
            return view('Cart.show', ['cartItems' => Cart::where('user_id', $user->id)->get()]);
        } else {
            // Handle the case when the user is not authenticated
            return redirect()->route('login');
        }
    }

    public function destroy($id)
    {
        //
        $user = Auth::user();
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();
        return view('Cart.show', ['cartItems' => Cart::where('user_id', $user->id)->get()]);
    }
}
