<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use Cart;

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

    public function AddCart(Request $request){

        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['price']=$request->price;
        $data['weight']=$request->weight;

        $add=Cart::add($data);

        return redirect()->back()->with('message','Product Added');


    }

    public function CartUpdate(Request $request, $rowId){

        $qty=$request->qty;
        $update=Cart::update($rowId, $qty);

        return redirect()->back()->with('message','Update Successfully');

    }

    public function CartRemove($rowId){

        $remove=Cart::remove($rowId);

        return redirect()->back()->with('message','Product Removed');
    }


    public function CreateInvoice(Request $request){

          $request->validate([
            'cus_id' => 'required',
          ],
          [
              'cus_id.required' => 'Select A Customer First !',
          ]);

          $cus_id=$request->cus_id;
          $customer=Customer::where('id', $cus_id)->first();
          $contents=Cart::content();

        return view('invoice', compact('customer', 'contents'));
    }
}
