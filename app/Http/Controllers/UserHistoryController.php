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

class UserHistoryController extends Controller
{
    public function getsearchhistory(){
    	$user_id = Session::get('userid');
    	$getuserdetails = DB::select('call Get_user_History_Data()');
    	$getrole = DB::select('call Get_role(?)',array($user_id));
        return view('userhistory',['getuserdetails'=>$getuserdetails,'getrole'=>$getrole]);
    }

    public function delhistory(Request $req){
    	 $deldata = DB::delete('call Del_History_data(?)',array($req->uid));
        return $deldata;
    }
}
