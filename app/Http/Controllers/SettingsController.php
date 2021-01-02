<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $validateData = $request->validate([
            'company_name' => 'required|max:255',
            'company_address' => 'required|max:255',
            'company_email' => 'required|max:255',
            'company_mobile' => 'required',
            'company_city' => 'required|max:30',
            'company_country' => 'required',
            'company_phone' => 'required',
          ]);

        $settings=Setting::first();
        return view('settings', compact('settings'));
        
    }
}
