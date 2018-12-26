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

class RegisterController extends InitialController
{
    public function register()
    {
        return view('register');
    }

    public function registeruser(Request $req)
    {
        //return "qwewr";exit();
        $detail = DB::select('call createuser(?,?,?,?,?)',array($req->fullname,$req->phoneno,$req->emailid,$req->password,''));        
        return $this::send_success_response("Message","success",$detail);        
    }
}
