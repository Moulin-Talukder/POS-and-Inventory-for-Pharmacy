<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
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

        return view('add_supplier');
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:suppliers|max:255',
            'phone' => 'required|unique:suppliers|max:255',
            'address' => 'required',
            'photo' => 'required',
            'city' => 'required',
          ]);
        
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shop']=$request->shop;
        $data['accountholder']=$request->accountholder;
        $data['accountnumber']=$request->accountnumber;
        $data['bankname']=$request->bankname;
        $data['branchname']=$request->branchname;
        $data['city']=$request->city;
        $data['type']=$request->type;

        $image = $request->file('photo');
        if($image){
            $image_name = uniqid('uploads__',true);
            $ext= strtolower($image->getClientOriginalExtension());

            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $customer=DB::table('suppliers')
                ->insert($data);
                return Redirect()->route('add.supplier')->with('message','Supplier Added Successfully.');

            }
        }
        return Redirect()->route('add.supplier')->with('message','Supplier Added Successfully.');
    }

    public function AllSupplier(){
            $supplier=DB::table('suppliers')->get();
            return view('all_supplier', compact('supplier'));
    }

    //view a single supplier
public function ViewSupplier($id){

    $single=DB::table('suppliers')
            ->where('id',$id)
            ->first();
    return view('view_supplier', compact('single'));        

}

//delete a single supplier
public function DeleteSupplier($id){

    $delete=DB::table('suppliers')
            ->where('id',$id)
            ->first();
    $photo=$delete->photo;
    unlink($photo);
    $dltuser=DB::table('suppliers')
             ->where('id',$id)
             ->delete();       

             return Redirect()->route('all.supplier')->with('message','Deleted Successfully.');

    
}

    //edit a single supplier
public function EditSupplier($id){
        
    $edit=DB::table('suppliers')
          ->where('id',$id)
          ->first();
    return view('edit_supplier', compact('edit'));

 }

      //update a single customer
      public function UpdateSupplier(Request $request,$id){

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
        $data['shop']=$request->shop;
        $data['accountholder']=$request->accountholder;
        $data['accountnumber']=$request->accountnumber;
        $data['bankname']=$request->bankname;
        $data['branchname']=$request->branchname;
        $data['city']=$request->city;
        $data['type']=$request->type;
        $image = $request->photo;

        $img=DB::table('suppliers')->where('id',$id)->first();
        if($image){
            $image_name = uniqid('uploads__',true);
                $ext= strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/supplier/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                 $data['photo']=$image_url;
                    $image_path = $img->photo;
                    $done=unlink($image_path);
                    $user=DB::table('suppliers')->where('id',$id)->update($data);
                    return redirect()->route('all.supplier')->with('message','Supplier Updated Successfully.');
                    
        }
        $user=DB::table('suppliers')->where('id',$id)->update($data);

        return redirect()->route('all.supplier')->with('message','Supplier Updated Successfully.');


}
}
