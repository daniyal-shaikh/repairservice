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

class ModalMasterController extends Controller
{
    public function modelmaster(){
        $user_id = Session::get('userid');
    	$getcompany = DB::select('call Get_all_company()');
    	$getmodal = DB::select('call Get_model()');
        $getrole = DB::select('call Get_role(?)',array($user_id));
    	return view('ModalMaster',['getcompany'=>$getcompany,'getmodal'=>$getmodal,'getrole'=>$getrole]);
    }

    public function addmodal(Request $req){
    	$data = DB::select('call Save_Model(?,?,?)',array(null,$req->comid,$req->modalname));
    	if(count($data)>0){
    		return redirect()->back()->with('message', 'Save model successfully.');
    	}else{
    		return redirect()->back()->with('message', 'Faild save model.');
    	}
    }

    public function editmodel(Request $req){
    	$geteditmodel = DB::select('call Get_update_model(?)',array($req->model_id));
    	return $geteditmodel;
    }

    public function editsavemodel(Request $req){
    	$data = DB::select('call Save_Model(?,?,?)',array($req->modelid,$req->ecomid,$req->modelname));
    	if(count($data)>0){
    		return redirect()->back()->with('message', 'Update model successfully.');
    	}else{
    		return redirect()->back()->with('message', 'Faild update model.');
    	}
    }

    public function delmodel(Request $req){
    	$data = DB::delete('call Del_model(?)',array($req->mid));
    	return $data;
    }
}
