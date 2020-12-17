<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
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


    public function AddCategory(){

        return view('add_category');
    }

    public function InsertCategory(Request $request){

        $data=array();
        $data['cat_name']=$request->cat_name;
        $cat=DB::table('categories')->insert($data);

        return Redirect()->back()->with('message','Category Added Successfully');
        
    }


    public function AllCategory(){

        $category=DB::table('categories')->get();

        return view('all_category', compact('category'));
    }


    public function DeleteCategory($id){
        $dlt=DB::table('categories')->where('id', $id)->delete();

        return Redirect()->back()->with('message','Category Deleted Successfully');
    }



    //edit a single customer
public function EditCategory($id){
        
    $edit=DB::table('categories')
          ->where('id',$id)
          ->first();
    return view('edit_category', compact('edit'));

 }


 public function UpdateCategory(Request $request,$id){

    $data=array();
    $data['cat_name']=$request->cat_name;
    $cat_up=DB::table('categories')->where('id',$id)->update($data);

    return Redirect()->route('all.category')->with('message','Category Updated Successfully.');

 }


}
