<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;

class POSController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $product=Product::
        join('categories', 'products.cat_id', 'categories.id')
        ->select('categories.cat_name', 'products.*')
        ->get();
        $customer=Customer::get();
        $category=Category::get();
        return view('pos', compact('product', 'customer', 'category'));
    }
}
