<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;

class LoginController extends InitialController
{   
   
    public function checklogin(Request $request){
        if(!$request->session()->exists('userid')){
            return view('login');
        }else{
            return redirect('/dashboard');
        }
    }

    public function login(Request $request){
        
        $query=DB::select('call login(?,?)',array($request->mobileno,$request->password));               
          if($query){
            $val=$query[0];
            $request->session()->flush();
            $request->session()->put('userid',$val->userid);
            $request->session()->put('fullname',$val->fullname);         
            return redirect()->intended('dashboard');
        }else{
            Session::flash('msg', "Invalid email or password. Please Try again! ");      
            return redirect()->intended('dashboard');
        }                         
    }


    public function registeruser(Request $req)
    {
        //return "qwewr";exit();
        $detail = DB::select('call createuser(?,?,?,?,?)',array($req->fullname,$req->phoneno,$req->emailid,$req->password,''));        
        return $this::send_success_response("Message","success",$detail);        
    }
}
