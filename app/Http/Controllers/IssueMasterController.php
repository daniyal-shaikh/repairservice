<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Responce;
use DB;

class IssueMasterController extends Controller
{
    public function issuemaster(Request $req){
    	$getissue = DB::select('call Get_all_issue()');
    	return view('IssueMaster',['getissue'=>$getissue]);
    }

    public function addissue(Request $req){
    	$data = DB::select('call Save_issue(?,?)',array(null,$req->issuename));
    	if(count($data)>0){
    		return redirect()->back()->with('message', 'Save issue successfully.');
    	}else{
    		return redirect()->back()->with('message', 'Faild save issue.');
    	}
    }

    public function editissue(Request $req){
    	$data = DB::select('call Save_issue(?,?)',array($req->issueid,$req->eissuename));
    	if(count($data)>0){
    		return redirect()->back()->with('message', 'Update issue successfully.');
    	}else{
    		return redirect()->back()->with('message', 'Faild update issue.');
    	}
    }

    public function delissue(Request $req){
    	$data = DB::delete('call Del_issue(?)',array($req->isseid));
    	return $data;
    }
}
