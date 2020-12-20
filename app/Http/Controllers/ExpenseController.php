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

        


    }
}
