<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
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

    public function AddProduct(){

    	return view('add_product');
    }

    public function InsertProduct(Request $request)
    {


        $validateData = $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|unique:products|max:255',
            'cat_id' => 'required',
            'sup_id' => 'required',
            'product_garage' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'product_image' => 'required',
          ]);

        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;


        $image = $request->file('product_image');
        if($image){
            $image_name = uniqid('uploads__',true);
            $ext= strtolower($image->getClientOriginalExtension());

            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image']=$image_url;
                $product=DB::table('products')
                ->insert($data);
                return Redirect()->route('add.product')->with('message','Product Added Successfully.');

            }
        }

        return redirect()->route('add.product')->with('message','Product Added Successfully.');


    }


    public function AllProduct(){

        $product=DB::table('products')->get();
        return view("all_product")->with('product', $product);
    }


    //delete a single product
    public function DeleteProduct($id){

        $delete=DB::table('products')
                ->where('id',$id)
                ->first();
        $photo=$delete->product_image;
        unlink($photo);
        $dltuser=DB::table('products')
                 ->where('id',$id)
                 ->delete();       

            return Redirect()->route('all.product')->with('message','Deleted Successfully.');
       
}

   //edit a single product
public function EditProduct($id){
        
    $edit=DB::table('products')
          ->where('id',$id)
          ->first();
    return view('edit_product', compact('edit'));

 }


 //update a single product
 public function UpdateProduct(Request $request,$id){

    $validateData = $request->validate([
        'product_name' => 'required|max:255',
        'product_code' => 'required|max:255',
        'cat_id' => 'required',
        'sup_id' => 'required',
        'product_garage' => 'required',
        'product_route' => 'required',
        'buy_date' => 'required',
        'expire_date' => 'required',
        'buying_price' => 'required',
        'selling_price' => 'required',
      ]);

      $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;


        $image = $request->product_image;

        $img=DB::table('products')->where('id',$id)->first();
        if($image){
            $image_name = uniqid('uploads__',true);
                $ext= strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/product/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                 $data['product_image']=$image_url;
                    $image_path = $img->product_image;
                    $done=unlink($image_path);
                    $user=DB::table('products')->where('id',$id)->update($data);
                    return redirect()->route('all.product')->with('message','Product Updated Successfully.');
                    
        }
        $user=DB::table('products')->where('id',$id)->update($data);

        return redirect()->route('all.product')->with('message','Product Updated Successfully.');

 }

     //view a single product
public function ViewProduct($id){

    $single=DB::table('products')
            ->join('categories', 'products.cat_id', 'categories.id')
            ->join('suppliers', 'products.sup_id', 'suppliers.id')
            ->select('categories.cat_name', 'products.*', 'suppliers.name')           
            ->where('products.id',$id)
            ->first();
    return view('view_product', compact('single'));        

}


}
