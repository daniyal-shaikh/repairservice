<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Responce;
use DB;

class CompanyMasterController extends Controller
{
    public function companymaster(){
    	$getcompany = DB::select('call Get_all_company()');
    	return view('CompanyMaster',['getcompany'=>$getcompany]);
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
