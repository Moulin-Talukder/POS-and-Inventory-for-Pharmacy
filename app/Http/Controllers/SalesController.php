<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class SalesController extends Controller
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

    public function TodaySales(){

        $todaysale=Order::
        join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.name', 'orders.*')->where('order_status','success')->get();

        return view('today_sales', compact('todaysale'));

    }


}
