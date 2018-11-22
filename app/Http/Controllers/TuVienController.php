<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\user;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
class TuVienController extends Controller
{
    public function getPhapDanh($tangniid){
        $phapdanh = DB::table('tangni')->select('PhapDanh')->where('id_tangni','=',$tangniid)->value('PhapDanh');
        return $phapdanh;
    }
    public function getRoleID($userid){
       
        $roleid = DB::table('permission')->select('role_id')->where('user_id','=',$userid)->value('role_id');
        return $roleid;
    }

    public function getDanhSachTuVien(){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->id_tangni;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        if($roleid === 1){
            $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.XaPhuongID','=','XaPhuong.XaPhuongID') 
            -> join('QuanHuyen','XaPhuong.QuanHuyenID','=','QuanHuyen.QuanHuyenID')
            ->join('TrangThai','TuVien.TrangThaiID','=','TrangThai.TrangThaiID')
            ->select('TuVienID','TuVien_Ten','XaPhuong_Ten','QuanHuyen_Ten','TrangThai_Ten','trutri','phone','diachi')->get();
            return view('admincaptinh/tuvien/danhsach',['phapdanh'=>$phapdanh,'tuvien'=>$tuvien]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/endchangeemail',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/endchangeemail',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/endchangeemail',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/endchangeemail',['phapdanh'=>$phapdanh]);
        }
    }
    public function getChinhSuaFull(){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->id_tangni;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        if($roleid === 1){
            $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.XaPhuongID','=','XaPhuong.XaPhuongID') 
            -> join('QuanHuyen','XaPhuong.QuanHuyenID','=','QuanHuyen.QuanHuyenID')
            ->join('TrangThai','TuVien.TrangThaiID','=','TrangThai.TrangThaiID')
            ->select('TuVienID','TuVien_Ten','XaPhuong_Ten','QuanHuyen_Ten','TrangThai_Ten','trutri','phone','diachi')->get();
            return view('admincaptinh/tuvien/chinhsuafull',['phapdanh'=>$phapdanh,'tuvien'=>$tuvien]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/endchangeemail',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/endchangeemail',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/endchangeemail',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/endchangeemail',['phapdanh'=>$phapdanh]);
        }
    }
    public function getThemTuVien(){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->id_tangni;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        $quanhuyen = DB::table('quanhuyen')->select('*')->get();
        $trangthai = DB::table('trangthai')->select('*')->get();
        if($roleid === 1){
            
            return view('admincaptinh/tuvien/them',['phapdanh'=>$phapdanh, 'quanhuyen'=>$quanhuyen, 'trangthai'=>$trangthai]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/tuvien/them',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/tuvien/them',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/tuvien/them',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/tuvien/them',['phapdanh'=>$phapdanh]);
        }
    }

    public function postThem(Request $request){
        $validator = Validator::make($request->all(), [
        'phone' => 'bail|required|regex:/[0-9]{10}/',
        'image' => 'bail|mimes:jpeg,png|max:2048',
        
        ],
        [
            'regex'=>'Số điện thoại phải đúng 10 số',
            'mimes'=>'Hình ảnh không đúng định dạng',
            'max'=>'Kích thước tối đa file ảnh là 2MB'
        ]
    );

      if ($validator->fails()) {
         return back()->withErrors($validator)
                    ->withInput();
      }
      else{
         $name = $request->tentuvien;
         $trutri = $request->trutri;
         $trangthai = $request->trangthai;
         $diachi = $request->diachi;
         //$quanhuyen = $request->quanhuyen;
         $xaphuong = $request->xaphuong;
         $phone = $request->phone;
         $email = $request->email;
         if ($request->hasFile('image')) {

            $file = $request->image;
            $filename =  time().'_'.$file->getClientOriginalName();
            $upload = public_path('fontend_admin/image/tuvien');
            $file->move($upload, $filename);
            
        }
        else{
            $filename = NULL;
        }
        
         DB::table('tuvien')->insertGetId( 
          ['TuVien_Ten'=>$name,'trutri'=>$trutri,'TrangThaiID'=>$trangthai, 'diachi'=>$diachi,'XaPhuongID'=> $xaphuong, 'phone'=>$phone, 'email'=>$email, 'image'=>$filename]
        
        );
        return redirect('admincaptinh/tuvien/them')->with('thongbao1','Thêm Thành Công');
      }
   }
   //xoa tu vien
   public function getXoa($id){
        DB::table('tuvien')->where('TuVienID','=',$id)->delete();
        return redirect('admincaptinh/tuvien/danhsach');
   }
   public function getChinhSua($id){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->id_tangni;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.XaPhuongID','=','XaPhuong.XaPhuongID') 
            -> join('QuanHuyen','XaPhuong.QuanHuyenID','=','QuanHuyen.QuanHuyenID')
            ->join('TrangThai','TuVien.TrangThaiID','=','TrangThai.TrangThaiID')
            ->select('TuVienID','XaPhuong.XaPhuongID','TrangThai.TrangThaiID','QuanHuyen.QuanHuyenID','TuVien_Ten','XaPhuong_Ten','QuanHuyen_Ten','TrangThai_Ten','phone','email','image','trutri','diachi')->where('TuVienID','=',$id)->get();
        if($roleid === 1){
            
            return view('admincaptinh/tuvien/chinhsua',['phapdanh'=>$phapdanh,'tuvien'=>$tuvien]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
    }
    public function getChiTiet($id){
        $user = Auth::guard('user')->user();
        $userid = $user->id;
        $tangniid = $user->id_tangni;
        $roleid = $this->getRoleID($userid);
        $phapdanh = $this->getPhapDanh($tangniid);
        $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.XaPhuongID','=','XaPhuong.XaPhuongID') 
            -> join('QuanHuyen','XaPhuong.QuanHuyenID','=','QuanHuyen.QuanHuyenID')
            ->join('TrangThai','TuVien.TrangThaiID','=','TrangThai.TrangThaiID')
            ->select('TuVienID','XaPhuong.XaPhuongID','TrangThai.TrangThaiID','QuanHuyen.QuanHuyenID','TuVien_Ten','XaPhuong_Ten','QuanHuyen_Ten','TrangThai_Ten','phone','email','image','trutri','diachi')->where('TuVienID','=',$id)->get();
        if($roleid === 1){
            
            return view('admincaptinh/tuvien/chitiet',['phapdanh'=>$phapdanh,'tuvien'=>$tuvien]);
        }
        else if($roleid === 2){
            return view('admincaphuyen/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 3 ){
            return view('admincapxa/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else if($role_id === 4 ){
            return view('admincaptuvien/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
        else{
            return view('nguoidungthuong/tuvien/chinhsua',['phapdanh'=>$phapdanh]);
        }
    }
    public function postChinhSua(Request $request){
        $validator = Validator::make($request->all(), [
        'phone' => 'bail|required|regex:/[0-9]{10}/',
        'image' => 'bail|mimes:jpeg,png|max:2048',
        'trutri'=> 'bail|required',
        'diachi'=> 'bail|required',
        ],
        [
            'regex'=>'Số điện thoại phải đúng 10 số',
            'mimes'=>'Hình ảnh không đúng định dạng',
            'max'=>'Kích thước tối đa file ảnh là 2MB',
            'trutri.required'=>'Trường Trụ trì không được để trống',
            'phone.required'=>'Trường Số điện thoại không được để trống',
            'diachi.required'=>'Trường Địa chỉ không được để trống'
        ]
    );

      if ($validator->fails()) {
         return back()->withErrors($validator)
                    ->withInput();
      }
      else{
         $name = $request->tentuvien;
         $trutri = $request->trutri;
         $trangthai = $request->trangthai;
         $diachi = $request->diachi;
         //$quanhuyen = $request->quanhuyen;
         $xaphuong = $request->xaphuong;
         $phone = $request->phone;
         $email = $request->email;
         $tuvienid = $request->idtuvien;
         if ($request->hasFile('image')) {

            $file = $request->image;
            $filename =  time().'_'.$file->getClientOriginalName();
            $upload = public_path('fontend_admin/image/tuvien');
            $file->move($upload, $filename);
            
        }
        else{
            $filename = NULL;
        }
         DB::table('tuvien')->where('TuVienID','=',$tuvienid)
         ->update(['TuVien_Ten'=>$name, 'trutri'=>$trutri, 'TrangThaiID'=>$trangthai,
                    'diachi'=>$diachi,'XaPhuongID'=>$xaphuong,'phone'=>$phone, 'email'=>$email,'image'=>$filename]);
        return back()->with('thongbao1','Sửa Thành Công');
      }
    }
} 