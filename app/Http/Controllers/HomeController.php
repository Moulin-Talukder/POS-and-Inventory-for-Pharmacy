<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Expense;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Supplier;
use App\Models\AdvancedSalary;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $product = Product::count();
        $order = Order::count();
        $customer = Customer::count();
        $employee = Employee::count();
        $supplier = Supplier::count();

        // $month=$request->month;
        // $emp_id=$request->emp_id;
        // dd($request->all());

        // $emp= Employee::find($emp_id);
        // dd($emp_id);

        // $adv = AdvancedSalary::
        //               where('month', $month)
        //               ->where('year',$request->input('year'))
        //               ->where('emp_id', $emp_id)
        //               ->first();

        // $due_salary = $emp->salary - $adv->advanced_salary;
        $year=date("Y");
        $total=Expense::where('year', $year)->sum('amount');
        return view('home', compact('product', 'order','total', 'customer', 'employee', 'supplier'));
    }
}
