<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TangNi;
use App\TuVien;
use App\GioiPham;
use App\GiaoPham;
use Illuminate\Support\Facades\DB;
class TangNiController extends Controller
{
    public function getDanhSach($TuVienID){
    	$dstangni = DB::table('TangNi')->join('TuVien', 'TangNi.TuVienID','=','TuVien.TuVienID')->join('GioiPham','TangNi.GioiPhamID','=','GioiPham.GioiPhamID')
    	->join('GiaoPham','TangNi.GiaoPhamID','=','GiaoPham.GiaoPhamID')
    	->select('TangNiID','PhapDanh','TuoiDao','TuVien_Ten','GioiPham_Ten','GiaoPham_Ten','TangNi.TuVienID')
    	->where('TangNi.TuVienID','=',$TuVienID)->get();
    	return view('admin/tangni/danhsach',['dstangni'=>$dstangni]);
    }
    
    public function getDanhSachTN(){
    	$tangni = DB::table('TangNi')->join('TuVien', 'TangNi.TuVienID','=','TuVien.TuVienID')->join('GioiPham','TangNi.GioiPhamID','=','GioiPham.GioiPhamID')
        ->join('GiaoPham','TangNi.GiaoPhamID','=','GiaoPham.GiaoPhamID')
        ->select('TangNiID','PhapDanh','TuoiDao','TuVien_Ten','GioiPham_Ten','GiaoPham_Ten')->get();
    	return view('admin/tangni/danhsachfull',['tangni'=>$tangni]);
    }
    public function getThem(){
        return view('admin/tangni/themtangni');
    }
    public function getHoSo($TangNiID){
        return view('admin/tangni/hoso');
    }
    public function getChinhSua(){
        $tangni1 = DB::table('TangNi')->join('TuVien', 'TangNi.TuVienID','=','TuVien.TuVienID')->join('GioiPham','TangNi.GioiPhamID','=','GioiPham.GioiPhamID')
        ->join('GiaoPham','TangNi.GiaoPhamID','=','GiaoPham.GiaoPhamID')
        ->select('TangNiID','PhapDanh','TuoiDao','TuVien_Ten','GioiPham_Ten','GiaoPham_Ten')->get();
        return view('admin/tangni/chinhsua',['tangni1'=>$tangni1]);
    }
   
}
