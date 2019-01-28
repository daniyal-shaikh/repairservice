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


class CompanyMasterController extends Controller
{
    public function companymaster(){
        $user_id = Session::get('userid');
    	$getcompany = DB::select('call Get_all_company()');
        $getrole = DB::select('call Get_role(?)',array($user_id));
    	return view('CompanyMaster',['getcompany'=>$getcompany,'getrole'=>$getrole]);
    }

    public function addcompany(Request $req){
    	$data = DB::select('call Save_Company(?,?)',array(null,$req->companyname));
    	if(count($data)>0){
    		return redirect()->back()->with('message', 'Save company successfully.');
    	}else{
    		return redirect()->back()->with('message', 'Faild save company.');
    	}
    }

    public function editcompany(Request $req){
    	$data = DB::select('call Save_Company(?,?)',array($req->comid,$req->comname));
    	if(count($data)>0){
    		return redirect()->back()->with('message', 'Update company successfully.');
    	}else{
    		return redirect()->back()->with('message', 'Faild update company.');
    	}
    }

    public function delcompany(Request $req){
    	$data = DB::delete('call Del_company(?)',array($req->cid));
    	return $data;
    }
}
