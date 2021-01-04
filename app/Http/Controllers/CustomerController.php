<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
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
        return view('add_customer');
    }


    public function store(Request $request){

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:customers|max:255',
            'phone' => 'required|unique:customers|max:255',
            'address' => 'required',
            'photo' => 'required',
            'city' => 'required',
          ]);
        
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;
        
        $image = $request->file('photo');
        if($image){
            $image_name = uniqid('uploads__',true);
            $ext= strtolower($image->getClientOriginalExtension());

            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $customer=DB::table('customers')
                ->insert($data);
                return Redirect()->back()->with('message','Customer Added Successfully.');

            }
        }

        return redirect()->back()->with('message','Customer Added Successfully.');
    }
    //view all customer
    public function AllCustomer(){
            $customer=DB::table('customers')->get();
            return view("all_Customer")->with('customer', $customer);

    }

    //delete a single customer
    public function DeleteCustomer($id){

        $delete=DB::table('customers')
                ->where('id',$id)
                ->first();
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('customers')
                 ->where('id',$id)
                 ->delete();       

            return Redirect()->route('all.customer')->with('message','Deleted Successfully.');
       
}


//edit a single customer
public function EditCustomer($id){
        
    $edit=DB::table('customers')
          ->where('id',$id)
          ->first();
    return view('edit_customer', compact('edit'));

 }


     //update a single customer
     public function UpdateCustomer(Request $request,$id){

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'city' => 'required',
          ]);


          $data=array();
          $data['name']=$request->name;
          $data['email']=$request->email;
          $data['phone']=$request->phone;
          $data['address']=$request->address;
          $data['account_holder']=$request->account_holder;
          $data['account_number']=$request->account_number;
          $data['bank_name']=$request->bank_name;
          $data['bank_branch']=$request->bank_branch;
          $data['city']=$request->city;
          $image = $request->photo;

          $img=DB::table('customers')->where('id',$id)->first();
        if($image){
            $image_name = uniqid('uploads__',true);
                $ext= strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/customer/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                 $data['photo']=$image_url;
                    $image_path = $img->photo;
                    $done=unlink($image_path);
                    $user=DB::table('customers')->where('id',$id)->update($data);
                    return redirect()->route('all.customer')->with('message','Customer Updated Successfully.');
                    
        }
        $user=DB::table('customers')->where('id',$id)->update($data);

        return redirect()->route('all.customer')->with('message','Customer Updated Successfully.');

}

//view a single customer
public function ViewCustomer($id){

    $single=DB::table('customers')
            ->where('id',$id)
            ->first();
    return view('view_customer', compact('single'));        

}


}