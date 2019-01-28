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

class FindProductIssuePriceController extends Controller
{
	public function index_find_price(){
		 $user_id = Session::get('userid');
		 if($user_id == '' || $user_id == null){
		 	$user_id = '0';
		 }
		 //print_r($user_id); exit();
		 $getCompany = DB::select('call Get_all_company()');
		 $getissue = DB::select('call Get_all_issue()');
		 $getrole = DB::select('call Get_role(?)',array($user_id));
		 return view('FindProductIssuePrice',['getCompany'=>$getCompany,'getissue'=>$getissue,'getrole'=>$getrole]);
	}

	public function getmodeldependcompany(Request $req){
		$getmodel = DB::select('call Get_model_depends_company(?)',array($req->companyid));
		return $getmodel;
	}

	public function getprice(Request $req){
		$user_id = Session::get('userid');
		if($user_id != '0' && $user_id != null && $user_id != ''){
			$data = DB::select('call Get_price_depends_issue(?,?,?,?)',array($req->comid,$req->mid,$req->iid,$user_id));
			return $data;
		}else{
			return '1';
		}	
	}
}
