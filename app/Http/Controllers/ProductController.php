<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function Index(){

    	return view('product');
    }

    public function createProduct(Request $request)
    {
        //query builder

        //ORM
        Product::create([
            'name'=>$request->product_name,
            'price'=>$request->price,
            'description'=>$request->description
        ]);

        return redirect()->back();

    }
}
