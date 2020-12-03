<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Employee;

class EmployeeController extends Controller
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

        return view('add_employee');
    }
    
    //all employees
    public function store(Request $request){
        $validateData = $request->validate([
          'name' => 'required|max:255',
          'email' => 'required|unique:employees|max:255',
          'nid_no' => 'required|unique:employees|max:255',
          'address' => 'required',
          'phone' => 'required|max:13',
          'photo' => 'required',
          'salary' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image = $request->file('photo');

            if($image){
                $image_name = $request->name;
                $ext= strtolower($image->getClientOriginalExtension());

                

                // $image->getClientOriginalName()

                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/employee/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                if($success){
                    $data['photo']=$image_url;
                    $employee=DB::table('employees')
                    ->insert($data);

                    return Redirect()->route('add.employee')->with('message','Employee Added Successfully.');
    
                }
            }
        }
//all employees return here
    public function employees(){

        $employees= Employee::all();
        return view('all_employee', compact('employees'));

    }

//view a single employee
    public function ViewEmployee($id){

        $single=DB::table('employees')
                ->where('id',$id)
                ->first();
        return view('view_employee', compact('single'));        

    }


    //delete a single employee
    public function DeleteEmployee($id){

        $delete=DB::table('employees')
                ->where('id',$id)
                ->first();
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('employees')
                 ->where('id',$id)
                 ->delete();       

                 return Redirect()->route('all.employee')->with('message','Deleted Successfully.');

    }

//edit a single employee
    public function EditEmployee($id){
        
       $edit=DB::table('employees')
             ->where('id',$id)
             ->first();
       return view('edit_employee', compact('edit'));

    }

    //update a single employee
    public function UpdateEmployee(Request $request,$id){

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'nid_no' => 'required|unique:employees|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'salary' => 'required',
          ]);


        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image = $request->photo;


        if($image){
            $image_name = $request->name;
                $ext= strtolower($image->getClientOriginalExtension());

                

                // $image->getClientOriginalName()

                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/employee/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                if($success){
                    $data['photo']=$image_url;
                    $img=DB::table('employees')->where('id',$id)->first();
                    $image_path = $img->photo;
                    $done=unlink($image_path);
                    $user=DB::table('employees')->where('id',$id)->update($data);
                    if($user){
                        return Redirect()->route('all.employee')->with('message','Employee Updated Successfully.');
                    }else{

                    }
                    

                    
        }
    }


}

}