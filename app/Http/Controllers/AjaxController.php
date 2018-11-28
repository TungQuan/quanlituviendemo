<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TangNi;
use App\TuVien;
use App\GioiPham;
use App\GiaoPham;
use App\XaPhuong;
use App\QuanHuyen;
use Illuminate\Support\Facades\DB;
class AjaxController extends Controller
{
   public function getQuanHuyen(){
    $quanhuyen = DB::table('quanhuyen')->select('*')->get();
    echo "<option value='none'></option>";
     foreach($quanhuyen as $qh){
            echo "<option value='".$qh->QuanHuyenID."'>".$qh->QuanHuyen_Ten."</option>";
        }
   }

   public function getTrangThai(){
    $trangthai = DB::table('trangthai')->select('*')->get();
    echo "<option value='none'></option>";
    foreach($trangthai as $tt){  
            echo "<option value='".$tt->TrangThaiID."'>".$tt->TrangThai_Ten."</option>";
        }
   }
   public function getXaPhuong($idQuanHuyen){
        $xaphuong = DB::table('xaphuong')->select('*')->where("QuanHuyenID","=",$idQuanHuyen)->get();
        echo "<option value='none'></option>";
        foreach($xaphuong as $xp){
            echo "<option value='".$xp->XaPhuongID."'>".$xp->XaPhuong_Ten."</option>";
        }
   }
   public function getTuVienDistrict($idQuanHuyen){
      $tuviendistrict = DB::table('TuVien')->join('XaPhuong','TuVien.XaPhuongID','=','XaPhuong.XaPhuongID') -> join('QuanHuyen','XaPhuong.QuanHuyenID','=','QuanHuyen.QuanHuyenID')->select('TuVien.TuVienID','TuVien_Ten')->where('QuanHuyen.QuanHuyenID','=',$idQuanHuyen)->get();
      echo "<option value='none'></option>";
       foreach($tuviendistrict as $tvdt){
            echo "<option value='".$tvdt->TuVienID."'>".$tvdt->TuVien_Ten."</option>";
        } 
   }
    public function getTuVien($idXaPhuong){
        $tuvien = DB::table('tuvien')->select('TuVienID','TuVien_Ten')->where('XaPhuongID','=',$idXaPhuong)->get();
         echo "<option value='none'></option>";
        foreach($tuvien as $tv){
            echo "<option value='".$tv->TuVienID."'>".$tv->TuVien_Ten."</option>";
        }
   }
   public function getTuVienOfState($idTrangThai){
    $tuvien = DB::table('TuVien')->join('TrangThai','TuVien.TrangThaiID','=','TrangThai.TrangThaiID')->select('TuVienID','TuVien_Ten')->where('TrangThai.TrangThaiID','=',$idTrangThai)->get();
        echo "<option value='none'></option>";
        foreach($tuvien as $tv){
            echo "<option value='".$tv->TuVienID."'>".$tv->TuVien_Ten."</option>";
        }
   }
   public function getTuVienDistrictState($idTrangThai, $idQuanHuyen){
    $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.XaPhuongID','=','XaPhuong.XaPhuongID') -> join('QuanHuyen','XaPhuong.QuanHuyenID','=','QuanHuyen.QuanHuyenID')->select('TuVien.TuVienID','TuVien_Ten')->where([['QuanHuyen.QuanHuyenID','=',$idQuanHuyen],['TrangThaiID','=',$idTrangThai]])->get();
     echo "<option value='none'></option>";
        foreach($tuvien as $tv){
            echo "<option value='".$tv->TuVienID."'>".$tv->TuVien_Ten."</option>";
        }
   }

    public function getTuVienDistrictWardState($idTrangThai, $idQuanHuyen, $idXaPhuong){
      $tuvien = DB::table('TuVien')->join('XaPhuong','TuVien.XaPhuongID','=','XaPhuong.XaPhuongID') -> join('QuanHuyen','XaPhuong.QuanHuyenID','=','QuanHuyen.QuanHuyenID')->select('TuVien.TuVienID','TuVien_Ten')->where([['QuanHuyen.QuanHuyenID','=',$idQuanHuyen],['TrangThaiID','=',$idTrangThai],['XaPhuong.XaPhuongID','=',$idXaPhuong]])->get();
       echo "<option value='none'></option>";
          foreach($tuvien as $tv){
              echo "<option value='".$tv->TuVienID."'>".$tv->TuVien_Ten."</option>";
          }
   }
    public function getTangNiTuoiDao($idTuVien){
        $tuoidao = DB::table('TangNi')->select('TuoiDao')->where('TuVienID','=',$idTuVien)->distinct()->get();
        echo "<option value='none'></option>";
          foreach($tuoidao as $td){
              echo "<option>".$td->TuoiDao."</option>";
          }
    }

     public function getTangNiGioiPham($idTuVien){
        $gioipham = DB::table('TangNi')->join('GioiPham','TangNi.GioiPhamID','=','GioiPham.GioiPhamID') ->join('GiaoPham','TangNi.GiaoPhamID','=','GiaoPham.GiaoPhamID')->select('GioiPham_Ten')->where('TuVienID','=',$idTuVien)->distinct()->get();
        echo "<option value='none'></option>";
          foreach($gioipham as $gp){
              echo "<option>".$gp->GioiPham_Ten."</option>";
          }
    }

    public function getTangNiGiaoPham($idTuVien){
        $giaopham = DB::table('TangNi')->join('GioiPham','TangNi.GioiPhamID','=','GioiPham.GioiPhamID')->join('GiaoPham','TangNi.GiaoPhamID','=','GiaoPham.GiaoPhamID')->select('GiaoPham_Ten')->where('TuVienID','=',$idTuVien)->distinct()->get();
        echo "<option value='none'></option>";
          foreach($giaopham as $gp){
              echo "<option>".$gp->GiaoPham_Ten."</option>";
          }
    }

    public function getDanhSachTangNiTuVien(){
      $danhsach = DB::table('TuVien')->select('TuVien_Ten')->get();
      echo "<option value='none'></option>";
          foreach($danhsach as $ds){
              echo "<option>".$ds->TuVien_Ten."</option>";
          }
    }
    public function getDanhSachTangNiGioiPham(){
      $danhsach = DB::table('GioiPham')->select('GioiPham_Ten')->get();
      echo "<option value='none'></option>";
          foreach($danhsach as $ds){
              echo "<option>".$ds->GioiPham_Ten."</option>";
          }
    }
     public function getDanhSachTangNiGiaoPham(){
      $danhsach = DB::table('GiaoPham')->select('GiaoPham_Ten')->get();
      echo "<option value='none'></option>";
          foreach($danhsach as $ds){
              echo "<option>".$ds->GiaoPham_Ten."</option>";
          }
    }
    public function getDanhSachTangNiTuoiDao(){
      $danhsach = DB::table('TangNi')->select('TuoiDao')->distinct()->get();
      echo "<option value='none'></option>";
          foreach($danhsach as $ds){
              echo "<option>".$ds->TuoiDao."</option>";
          }
    }
     public function getTrangThaiEdit(){
      $trangthai = DB::table('trangthai')->select('*')->get();
      echo "<option value=''></option>";
          foreach($trangthai as $tr){
              echo "<option value='".$tr->TrangThaiID."'>".$tr->TrangThai_Ten."</option>";
          }
    }
    /*
    public function getQuanHuyenEdit(){
       $quanhuyen = DB::table('quanhuyen')->select('*')->get();
      echo "<option value=''></option>";
          foreach($quanhuyen as $qh){
              echo "<option value='".$qh->QuanHuyenID."'>".$qh->QuanHuyen_Ten."</option>";
          }
    }
    public function getXaPhuongEdit($quanhuyenid){
       $xaphuong = DB::table('xaphuong')->select('XaphuongID, XaPhuong_Ten')->where('QuanHuyenID','=',$quanhuyenid)->get();
      
      echo "<option value=''></option>";
          foreach($xaphuong as $xp){
              echo "<option value='".$xp->XaPhuongID."'>".$xp->XaPhuong_Ten."</option>";
          }

          echo "<table class='table table-bordered'>";
          echo "<thead>
                  <th>lua chon </th>
                  <th>STT</th>
                </thead>";
                foreach($xaphuong as xp)
                    echo "<TR >
                              <td class="trung"><input value="".""</td>
                          </tr>"
    } */
}
