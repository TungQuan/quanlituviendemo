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
use Carbon\Carbon;
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
    public function getDanhSachDon()
    {
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->id_tangni;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        $dontu=DB::table('dontu')->select('*')->get();
        if($roleid === 1){
            return view('admincaptinh/vanban/dontu/danhsachdon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/vanban/dontu/donxinxuatgia',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/vanban/dontu/danhsachdon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/vanban/dontu/danhsachdon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/vanban/dontu/danhsachdon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
    }
    public function getDonToUpload()
    {
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->id_tangni;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        $dontu=DB::table('dontu')->select('*')->get();
        if($roleid === 1){
            return view('admincaptinh/vanban/dontu/uploaddon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/vanban/dontu/uploaddon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/vanban/dontu/uploaddon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/vanban/dontu/uploaddon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/vanban/dontu/uploaddon',['dontu'=>$dontu,'phapdanh'=>$phapdanh]);
        }
    }

    public function postDonToUpload(request $request){
        $this->validate($request,
            ['tendon'=>'required|min:3|max:100',
            'dontu'=>'required'
            ],
            [
            'tendon.required'=>'Bạn chưa nhập tên đơn',
            'dontu.required'=>'Bạn chưa chọn đơn'
            ]);

        $tendon=$request->tendon;
        $ngaytao=carbon::now();
        $ghichu=$request->ghichu;
        if ($request->hasFile('dontu'))
        {
            $file=$request->file('dontu');
            $name = $file->getClientOriginalName();
            $dontu1 = str_random(4)."_".$name;
            while (file_exists('vanban/dontu/'.$dontu1))
            {
                $dontu1 = str_random(4)."_".$name;
            }
            $file->move('vanban/dontu',$dontu1);
            $dontu=$dontu1;
        }
        else 
        {
            $dontu->chondon = null;
        }
        DB::table('dontu')->insertGetId( 
          ['tendon'=>$tendon, 'ghichu'=>$ghichu, 'ngaytao'=>$ngaytao, 'chondon'=>$dontu]
        );
        return redirect('admincaptinh/vanban/uploaddontu')->with('thongbao','Thêm Thông Báo Thành Công!');
   }
}