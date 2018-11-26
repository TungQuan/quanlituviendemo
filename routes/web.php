<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('quantri','QuanTriAuth@getLogin')->middleware('loginmiddleware');

Route::post('quantri/logon','QuanTriAuth@postLogin');

Route::group(['middleware'=>'logoutmiddleware'], function(){

	Route::get('quantri/quanli','QuanTriController@getQuanLi')->middleware('quantrimiddleware');

	Route::get('quantri/hoso/doimatkhau','QuanTriController@getChangePassword')->middleware('quantrimiddleware');

	Route::get('quantri/doiemail/checkpassforchangeemail','QuanTriController@getCheckPassChangeEmail')->middleware('quantrimiddleware');

	Route::get('quantri/hoso/doiemail','QuanTriController@getDoiEmail')->middleware('quantrimiddleware');

	Route::get('quantri/logout','QuanTriController@getLogout')->middleware('quantrimiddleware');

	Route::get('quantri/resetpassword','QuanTriController@getPassReset');

	Route::get('quantri/quanliuser/danhsachuser','QuanTriController@getDanhSachUser')->middleware('quantrimiddleware');

	Route::get('quantri/quanliuser/usercaphuyen','QuanTriController@getUserCapHuyen')->middleware('quantrimiddleware');
 });
////-----------------Route  Tat Ca Thanh Vien-----------------------------
/* Login member*/
Route::get('/', 'MemberController@getMemberLogin')->middleware('memberloginmiddleware');

Route::post('/member/login','MemberAuth@postLogin');
/* End Login Mneber */

// Chnage Password And Change Email OF member :001
Route::post('member/hosocanhan/doimatkhau','MemberAuth@doiMatKhau');

Route::post('member/doiemail/checkpass','MemberAuth@postCheckPass');

Route::post('member/doiemail/endchangeemail','MemberAuth@postEndChangeEmail');

Route::post('admincaptinh/tuvien/them','TuVienController@postThem');

Route::post('admincaptinh/tuvien/chinhsua','TuVienController@postChinhSua');
//End  POsst ALL method --------//
Route::group(['middleware'=>['membermiddleware','logoutmiddleware']], function(){

	Route::get('/member/logout','MemberController@getMemberLogout');
//---------------------Admin Cap tinh 

//---------------------Admin Cap tinh -----------------------------------------------//
	Route::group(['prefix'=>'admincaptinh'], function(){

		Route::get('/quanli','MemberController@getQuanLi');

		Route::get('hosocanhan/doimatkhau','MemberController@getDoiMatKhau');

		Route::get('hosocanhan/changeemail','MemberController@getDoiEmail');

		Route::get('hosocanhan/endchangeemail','MemberController@getEndChangeEmail');
		///---tu vien ------------//
		Route::get('tuvien/danhsach', 'TuVienController@getDanhSachTuVien');

		Route::get('tuvien/chinhsuafull','TuVienController@getChinhSuaFull');

		Route::get('tuvien/them', 'TuVienController@getThemTuVien');

		Route::get('tuvien/xoa/{id}','TuVienController@getXoa');

		Route::get('tuvien/chinhsua/{id}','TuVienController@getChinhSua');

		Route::get('tuvien/chitiet/{id}','TuVienController@getChiTiet');	
		///-----ket thuc tu vien ---------//
		Route::group(['prefix'=>'ajax'],function(){

			Route::get('quanhuyen','AjaxController@getQuanHuyen');

			Route::get('trangthai','AjaxController@getTrangThai');

			Route::get('xaphuong/{id}','AjaxController@getXaPhuong');

			Route::get('tuviendistrict/{id}','AjaxController@getTuVienDistrict');

			Route::get('tuvien/{id}','AjaxController@getTuVien');

			Route::get('state/{id}','AjaxController@getTuVienOfState');

			Route::get('state/{id}/district/{id2}','AjaxController@getTuVienDistrictState');

			Route::get('state/{id}/district/{id2}/ward/{id3}','AjaxController@getTuVienDistrictWardState');
		});
			//Route::get('edittrangthai','AjaxController@getTrangThaiEdit');
			///--- Văn Bản ------------//
		
		Route::group(['prefix'=>'vanban'],function(){
			Route::get('danhsachthongbao', 'VanBanController@getDanhSach');
			Route::get('uploadthongbao','VanBanController@getVanBan');
			Route::post('uploadthongbao','VanBanController@postVanban');

			Route::get('danhsachdontu','PDFController@getDanhSachDon');
			Route::get('taodon','PDFController@getDon');
			Route::get('uploaddontu','PDFController@getDonToUpload');
			Route::post('uploaddontu','PDFController@postDonToUpload');

			
		});
			///--- Kết Thúc Văn Bản ------------//

		
	});

//-----------------------------Admin Cap Huyen ---------------------------//
	Route::group(['prefix'=>'admincaphuyen'], function(){

		Route::get('quanli/{id}/{code}','AdminCapHuyenController@getQuanLi');

	});
	//------cap xa -------------
	Route::group(['prefix'=>'admincapxa'], function(){

		Route::get('quanli/{id}','AdminCapXaController@getQuanLi');
		
	});
	//--------------------cap tu vien ----------------------//
	Route::group(['prefix'=>'admincaptuvien'], function(){

		Route::get('quanli/{id}','AdminCapTuVienController@getQuanLi');
		
	});
	Route::group(['prefix'=>'nguoidungthuong'], function(){

		Route::get('quanli/{id}','NormalMemberController@getQuanLi');
		
	});
});
// ---------------------Post nguoi dung quan tri --------------/
Route::post('quantri/resetpassword','QuanTriController@postPassReset');

Route::post('quantri/hoso/doimatkhau','QuanTriAuth@postChangePassword');

Route::post('quantri/doiemail/checkpassforchangeemail','QuanTriAuth@postCheckPassForChangeEmail');

Route::post('quantri/hoso/doiemail','QuanTriAuth@postChangeEmail');
//-------------End Post quan tri ------------//
Route::group(['prefix'=>'admin'], function(){
	//admin/tuvien/danhsach
	Route::group(['prefix'=>'tuvien'], function(){

		Route::get('danhsach', 'TuVienController@getDanhSach');
		//In ra trang them
		Route::get('them','TuVienController@getThem');
		//In ra Trang Chinh Sua
		Route::get('chinhsua','TuVienController@getChinhSua');
		//trang ban do
		Route::get('bando','TuVienController@getBanDo');
	});

	Route::group(['prefix'=>'tangni'],function(){
		
		Route::get('danhsach/{id}','TangNiController@getDanhSach');

		Route::get('danhsachtangni','TangNiController@getDanhSachTN');

		Route::get('them','TangNiController@getThem');

		Route::get('hoso/{id}','TangNiController@getHoSo');

		Route::get('chinhsua','TangNiController@getChinhSua');

	});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('xaphuong/{id}','AjaxController@getXaPhuong');

		Route::get('tuvien/{id}','AjaxController@getTuVien');

		Route::get('quanhuyen','AjaxController@getQuanHuyen');

		Route::get('tuviendistrict/{id}','AjaxController@getTuVienDistrict');

		Route::get('trangthai','AjaxController@getTrangThai');

		Route::get('state/{id}','AjaxController@getTuVienOfState');

		Route::get('state/{id}/district/{id2}','AjaxController@getTuVienDistrictState');

		Route::get('state/{id}/district/{id2}/ward/{id3}','AjaxController@getTuVienDistrictWardState');
		Route::get('tangni/tuoidao/{id}', 'AjaxController@getTangNiTuoiDao');

		Route::get('tangni/gioipham/{id}', 'AjaxController@getTangNiGioiPham');

		Route::get('tangni/giaopham/{id}', 'AjaxController@getTangNiGiaoPham');

		Route::get('danhsach/tangni/tuvien', 'AjaxController@getDanhSachTangNiTuVien');

		Route::get('danhsach/tangni/tuoidao', 'AjaxController@getDanhSachTangNiTuoiDao');

		Route::get('danhsach/tangni/gioipham', 'AjaxController@getDanhSachTangNiGioiPham');

		Route::get('danhsach/tangni/giaopham', 'AjaxController@getDanhSachTangNiGiaoPham');
	});

	Route::group(['prefix'=>'bando'],function(){
		
		// Route::get('bando-index','bandocontroller@getbando_index');

		Route::get('chiduong','bandocontroller@getbando_chiduong');

		Route::get('timkiem','bandocontroller@getbando_timkiem');
		
		Route::get('bando','bandocontroller@getbando');
	});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
