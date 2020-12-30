<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ExpenseController extends Controller
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

    public function AddExpense(){

        return view('add_expense');
    }

    public function InsertExpense(Request $request){

        $validateData = $request->validate([
            'details' => 'required|max:255',
            'amount' => 'required|max:255',
            'date' => 'required|max:255',
            'month' => 'required',
            'year' => 'required',
            
          ]);
        
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        $data['month']=$request->month;
        $data['year']=$request->year;

        $exp=DB::table('expenses')->insert($data);
        return Redirect()->back()->with('message','Successfully Expense Inserted');
    }

    public function TodayExpense(){

        $date= date("d/m/y");
        $today=DB::table('expenses')->where('date', $date)->get();

        return view('today_expense', compact('today'));
   
    }

    public function EditTodayExpense($id){

        $tdy=DB::table('expenses')->where('id',$id)->first();
        return view('edit_today_expense', compact('tdy'));
    }


    public function UpdateTodayExpense(Request $request,$id){

        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        $data['month']=$request->month;
        $data['year']=$request->year;

        $exp=DB::table('expenses')->where('id',$id)->update($data);
        return Redirect()->route('today.expense')->with('message','Successfully Expense Updated');

    }


    public function MonthlyExpense(){

        $month = date("F");
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));

    }
    public function YearlyExpense(){

        $year = date("Y");
        $expense=DB::table('expenses')->where('year', $year)->get();

        return view('yearly_expense', compact('expense'));

    }

    public function DecemberExpense(){
        $month = "December";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }

    public function JanuaryExpense(){
        $month = "January";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }

    public function FebruaryExpense(){
        $month = "February";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }
    public function MarchExpense(){
        $month = "March";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }
    public function AprilExpense(){
        $month = "April";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }
    public function MayExpense(){
        $month = "May";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }
    public function JuneExpense(){
        $month = "June";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }
    public function JulyExpense(){
        $month = "July";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }
    public function AugustExpense(){
        $month = "August";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }
    public function SeptemberExpense(){
        $month = "September";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }
    public function OctoberExpense(){
        $month = "October";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }
    public function NovemberExpense(){
        $month = "November";
        $expense=DB::table('expenses')->where('month', $month)->get();

        return view('monthly_expense', compact('expense'));
    }

}
