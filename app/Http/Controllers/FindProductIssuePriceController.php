<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Responce;

class FindProductIssuePriceController extends Controller
{
	public function index_find_price(){
		 $getCompany = DB::select('call Get_all_company()');
		 $getissue = DB::select('call Get_all_issue()');
		 return view('FindProductIssuePrice',['getCompany'=>$getCompany,'getissue'=>$getissue]);
	}

	public function getmodeldependcompany(Request $req){
		$getmodel = DB::select('call Get_model_depends_company(?)',array($req->companyid));
		return $getmodel;
	}

	public function getprice(Request $req){
		$data = DB::select('call Get_price_depends_issue(?,?,?)',array($req->comid,$req->mid,$req->iid));
		return $data;
	}
}
