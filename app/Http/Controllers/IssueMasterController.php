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

class IssueMasterController extends Controller
{
    public function issuemaster(Request $req){
        $user_id = Session::get('userid');
    	$getissue = DB::select('call Get_all_issue()');
        $getrole = DB::select('call Get_role(?)',array($user_id));
    	return view('IssueMaster',['getissue'=>$getissue,'getrole'=>$getrole]);
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
