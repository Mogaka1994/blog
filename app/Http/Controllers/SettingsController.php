<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingsController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        return view('admin.settings.settings')->with('settings',Setting::first());
    }
    public function update(Request $request){
        $settings=Setting::first();
        $this->validate($request,[
                'site_name'=>'required',
                'address'=>'required',
                'contact_email'=>'required|email',
                'contact_number'=>'required'
        ]);
        $settings->site_name=$request->site_name;
        $settings->address=$request->address;
        $settings->contact_email=$request->contact_email;
        $settings->contact_number=$request->contact_number;
        $settings->save();
        Session::flash('success','Settings updated successfully');
        return redirect()->back();
    }
}
