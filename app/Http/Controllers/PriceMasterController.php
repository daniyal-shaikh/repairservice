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

class PriceMasterController extends Controller
{
    public function pricemaster(){
        $user_id = Session::get('userid');
    	$getcompany = DB::select('call Get_all_company()');
    	//$getmodal = DB::select('call Get_model()');
    	$getissue = DB::select('call Get_all_issue()');
    	$getprice = DB::select('call Get_all_price()');
        $getrole = DB::select('call Get_role(?)',array($user_id));
    	return view('PriceMaster',['getcompany'=>$getcompany,'getissue'=>$getissue,'getprice'=>$getprice,'getrole'=>$getrole]);
    }

    public function addprice(Request $req){
    	$data = DB::select('call Save_price(?,?,?,?,?)',array(null,$req->comid,$req->mid,$req->issid,$req->aprice));
    	if(count($data)>0){
    		return redirect()->back()->with('message', 'Save price successfully.');
    	}else{
    		return redirect()->back()->with('message', 'Faild price issue.');
    	}
    }

    public function viewupdateprice(Request $req){
        $updatedata = DB::select('call Get_update_price(?)',array($req->priceid));
        return $updatedata;
    }

    public function updatesaveprice(Request $req){
        $data = DB::select('call Save_price(?,?,?,?,?)',array($req->upid,$req->ucomid,$req->umid,$req->uissid,$req->uprice));
        if(count($data)>0){
            return redirect()->back()->with('message', 'Update price successfully.');
        }else{
            return redirect()->back()->with('message', 'Faild update issue.');
        }
    }

    public function delprice(Request $req){
        $deldata = DB::delete('call Del_price(?)',array($req->prid));
        return $deldata;
    }
}
