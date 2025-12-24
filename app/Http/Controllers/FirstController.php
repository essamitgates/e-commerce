<?php

namespace App\Http\Controllers;

use App\Models\Category;

class FirstController extends Controller
{
    //
    public function show()
    {
        $result = Category::all();

        return view('welcome', ['categories' => $result]);
    }

    
}
