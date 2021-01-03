<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
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


    public function Settings(){

       

        $settings=Setting::first();
        return view('settings', compact('settings'));
        
    }

    public function UpdateWebsite(Request $request, $id){

        $validateData = $request->validate([
            'company_name' => 'required|max:255',
            'company_address' => 'required|max:255',
            'company_email' => 'required|max:255',
            'company_mobile' => 'required',
            'company_city' => 'required|max:30',
            'company_country' => 'required',
            'company_phone' => 'required',
          ]);


          $data=array();
          $data['company_name']=$request->company_name;
          $data['company_address']=$request->company_address;
          $data['company_email']=$request->company_email;
          $data['company_mobile']=$request->company_mobile;
          $data['company_city']=$request->company_city;
          $data['company_country']=$request->company_country;
          $data['company_phone']=$request->company_phone;
          $data['company_zipcode']=$request->company_zipcode;
          $image = $request->company_logo;
  
          $img=Setting::where('id',$id)->first();
          if($image){
              $image_name = uniqid('uploads__',true);
                  $ext= strtolower($image->getClientOriginalExtension());
                  $image_full_name=$image_name.'.'.$ext;
                  $upload_path='public/company/';
                  $image_url=$upload_path.$image_full_name;
                  $success=$image->move($upload_path,$image_full_name);
                  
                      $data['company_logo']=$image_url;
                      $image_path = $img->company_logo;
                      $done=unlink($image_path);
                      $user=Setting::where('id',$id)->update($data);
                      return Redirect()->back()->with('message','Information Updated Successfully.');
                         
      }
      $user=Setting::where('id',$id)->update($data);
       
      return Redirect()->back()->with('message','Information Updated Successfully.');

    }
}
