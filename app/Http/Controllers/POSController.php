<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Order;
use DB;
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


    public function FinalInvoice(Request $request){
        //dd($request->all());
        $data=array();
        $data['customer_id']=$request->customer_id;
        $data['order_date']=$request->order_date;
        $data['order_status']=$request->order_status;
        $data['total_products']=$request->total_products;
        $data['sub_total']=$request->sub_total;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['payment_status']=$request->payment_status;
        $data['pay']=$request->pay;
        $data['due']=$request->due;
        //dd($data);
        $order_id=DB::table('orders')->insertGetId($data);
        $contents=Cart::content();

        $odata=array();
        foreach($contents as $content){
            $odata['order_id']=$order_id;
            $odata['product_id']=$content->id;
            $odata['quantity']=$content->qty;
            $odata['unitcost']=$content->price;
            $odata['total']=$content->total;

            $insert=DB::table('orderdetails')->insert($odata);
     
        }
        
        Cart::destroy();
        return redirect()->route('pending.orders')->with('message','Successfully Invoice Created | Please deliver the products and accept status');


    }


    public function PendingOrder(){

        $pending=Order::
        join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.name', 'orders.*')->where('order_status','pending')->get();

        return view('pending_order', compact('pending'));
        
        
    }


    public function ViewOrder($id){

        $order=DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.*', 'orders.*')
        ->where('orders.id',$id)
        ->first();

        $order_details=DB::table('orderdetails')
        ->join('products', 'orderdetails.product_id', 'products.id')
        ->select('orderdetails.*', 'products.product_name', 'products.product_code')
        ->where('order_id', $id)
        ->get();

        return view('order_confirmation', compact('order', 'order_details'));

    }



    public function SuccessOrder(){

        $success=Order::
        join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.name', 'orders.*')->where('order_status','success')->get();

        return view('success_order', compact('success'));
    }




    public function POSDone($id){

        $approve=Order::where('id', $id)->update(array('order_status'=>'success'));

        if($approve){
            return redirect()->route('pending.orders')->with('message','Successfully Order Confirmed ! All Products Delivered');
        }else{
            return redirect()->route('pending.orders')->with('err','ERROR');

        }

    }



}
