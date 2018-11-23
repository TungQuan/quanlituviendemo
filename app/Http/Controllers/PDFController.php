<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\user;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use PDF;
use App;
use View;
use Dompdf\Dompdf;
class PDFController extends Controller
{
    //
	 public function getPhapDanh($tangniid){
        $phapdanh = DB::table('tangni')->select('PhapDanh')->where('id_tangni','=',$tangniid)->value('PhapDanh');
        return $phapdanh;
    }
    public function getRoleID($userid){
       
        $roleid = DB::table('permission')->select('role_id')->where('user_id','=',$userid)->value('role_id');
        return $roleid;
    }
    public function getDon()
    {
    	$user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->id_tangni;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        if($roleid === 1){
            return view('admincaptinh/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
    }

    public function convertToPDF1()
    {
    	$user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->id_tangni;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        if($roleid === 1){
        	return PDF::loadFile('http://localhost:8888/quanlituviendemo/public/admincaptinh/vanban/taodon')->inline('github.pdf');
        }
        else if($roleid === 2){
            return view('admincaphuyen/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/vanban/dontu/donxinxuatgia',['phapdanh'=>$phapdanh]);
        }
  //   	$pdf = App::make('dompdf.wrapper');
		// $pdf->loadHTML('<h1>Test</h1>');
		// return $pdf->stream();
		
    }
}
