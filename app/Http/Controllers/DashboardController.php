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


class DashboardController extends Controller
{
    public function viewdashboard(Request $req){
    	$user_id = Session::get('userid');
    	$getrole = DB::select('call Get_role(?)',array($user_id));
    	//print_r($getrole[0]->role); exit();
    	return view('dashboard',['getrole'=>$getrole]);
    }
}
