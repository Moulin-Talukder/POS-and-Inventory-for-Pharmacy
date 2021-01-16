<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Employee;
use App\Models\AdvancedSalary;

class SalaryController extends Controller
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

    public function AddSalary(){

        return view('add_salary');
    }

    public function AllSalary(){

      $salary=DB::table('advance_salaries')
                ->join('employees', 'advance_salaries.emp_id', 'employees.id')
                ->select('advance_salaries.*', 'employees.name', 'employees.salary', 'employees.photo')
                ->orderBy('id', 'DESC')
                ->get();
                

        return view('all_salary', compact('salary'));
    }

    public function InsertSalary(Request $request){


        $month=$request->month;
        $emp_id=$request->emp_id;



        $employee= Employee::find($emp_id);
        //dd($emp_id);

        $advanced = AdvancedSalary::
                      where('month', $month)
                      ->where('year',$request->input('year'))
                      ->where('emp_id', $emp_id)
                      ->first();
                   if($advanced){                 
                      $due_salary = $employee->salary - $advanced->advanced_salary;

                      $total = $request->advanced_salary + $advanced->advanced_salary;

                      if($request->advanced_salary <= $due_salary){
                        $advanced->update([
                          'advanced_salary'=> $total
                        ]);

                        
                        return Redirect()->route('all.salary')->with('message','Successfully Paid.');
                      }
                      return Redirect()->back()->with('error','Already Paid or Amount Exceeds the Salary.');
                      
                   }

                      
                        $data=array();
                        $data['emp_id']=$request->emp_id;
                        $data['month']=$request->month;
                        $data['advanced_salary']=$request->advanced_salary;
                        $data['year']=$request->year;

                        if($data['advanced_salary'] <= $employee->salary){
                        $advanced=DB::table('advance_salaries')->insert($data);
                        
                        return Redirect()->route('all.salary')->with('message','Successfully Paid.');

                      }else{
                        return Redirect()->back()->with('error','Already Paid or Amount Exceeds the Salary.');

                      }

        
    }


    public function PaySalary($id){

      $salary=AdvancedSalary::with('employee')->find($id);
      // dd($as);
      
          return view('pay_salary', compact('salary'));

    }




    public function UpdateSalary(Request $request){


      $month=$request->month;
      $emp_id=$request->id;

      $employee= Employee::find($emp_id);
      //dd($emp_id);

      $advanced = AdvancedSalary::
                    where('month', $month)
                    ->where('year',$request->input('year'))
                    ->where('emp_id', $emp_id)
                    ->first();
                 if($advanced){                 
                    $due_salary = $employee->salary - $advanced->advanced_salary;

                    $total = $request->advanced_salary + $advanced->advanced_salary;

                    if($request->advanced_salary <= $due_salary){
                      $advanced->update([
                        'advanced_salary'=> $total
                      ]);
                     
                      return Redirect()->route('all.salary')->with('message','Successfully Paid.');
                    }
                    return Redirect()->back()->with('error','Amount Exceeds the Salary.');
                    
                 }

                    
                      $data=array();
                      $data['emp_id']=$request->emp_id;
                      $data['month']=$request->month;
                      $data['advanced_salary']=$request->advanced_salary;
                      $data['year']=$request->year;

                      if($data['advanced_salary'] <= $employee->salary){
                      $advanced=DB::table('advance_salaries')->insert($data);
                      
                      return Redirect()->route('all.salary')->with('message','Successfully Paid.');

                    }else{
                      return Redirect()->back()->with('error','Amount Exceeds the Salary.');

                    }

      
  }


}
