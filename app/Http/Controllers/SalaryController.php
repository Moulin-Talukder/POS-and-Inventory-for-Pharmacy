<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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

    public function AddAdvancedSalary(){

        return view('advanced_salary');
    }

    public function AllSalary(){

      $salary=DB::table('advance_salaries')
                ->join('employees', 'advance_salaries.emp_id', 'employees.id')
                ->select('advance_salaries.*', 'employees.name', 'employees.salary', 'employees.photo')
                ->orderBy('id', 'DESC')
                ->get();
                

        return view('all_advanced_salary', compact('salary'));
    }

    public function InsertAdvanced(Request $request){


        $month=$request->month;
        $emp_id=$request->emp_id;

        $advanced=DB::table('advance_salaries')
                      ->where('month', $month)
                      ->where('emp_id', $emp_id)
                      ->first();

                      if($advanced === NULL){

                        $data=array();
                        $data['emp_id']=$request->emp_id;
                        $data['month']=$request->month;
                        $data['advanced_salary']=$request->advanced_salary;
                        $data['year']=$request->year;

                        $advanced=DB::table('advance_salaries')->insert($data);

                        return Redirect()->back()->with('message','Successfully Advance Paid in this Month.');

                      }else{
                        return Redirect()->back()->with('error','Already Paid.');

                      }

        
    }


    public function PaySalary(){

      // $month = date("F", strtotime('-1 month'));

      // $salary=DB::table('advance_salaries')
      //           ->join('employees', 'advance_salaries.emp_id', 'employees.id')
      //           ->select('advance_salaries.*', 'employees.name', 'employees.salary', 'employees.photo')
      //           ->where('month', $month)
      //           ->get();
                
        $employee=DB::table('employees')->get();
        return view('pay_salary', compact('employee'));

    }


}
