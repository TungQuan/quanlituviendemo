@extends('admincaptinh.layout.template')

<!-- Content -->

<!-- style -->
@section('css')
<style>
.title-thead{
background-color: #DF3A01;
color: #FFFFFF;
font-size: 18px;
text-align: center;
border-radius: 20px 20px 0px 0px;
font-weight: bold;
}
.title-tr:hover{
font-weight: bold;
}
.icon-file{
margin-bottom: 5px;
}
body {
background: rgb(204,204,204);
}
page[size="A4"] {
background: white;
width: 21cm;
height: 29.7cm;
display: block;
margin: 0 auto;
margin-bottom: 0.5cm;
box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
.a4{
padding-top: 40px;
}
#quochieu{
padding-left: 40px;
padding-top: 30px;
padding-top: 60px;
}
#tieungu{
padding-left: 50px;
}
hr{
width: 80px;
border: dashed;
border-width: 1px;
width: 120px;
}
.hr1{
padding-right: 60px;
}
.tendon{
text-align: center;
font-size: 20px;
font-weight: bold;
padding-top: 50px;
width: 100%;
}
.loichao{
padding-left: 120px;
padding-top: 20px;
}
.trutri{
padding-left: 80px;
padding-top: 20px;
}
#nguoigui{
padding-left: 80px;
padding-top: 5px;
}
#ngaylamdon{
text-align: right;
padding-right: 50px;
padding-top: 30px;
}
#kytentrai{
padding-left: 100px;
text-align: left;
}
#kytenphai{
text-align: right;
padding-right: 80px
}
.tbtop{
padding-top: 80px;
padding-left: 20px;
}
.tbleft{
}
.tbright{
padding-left: 0px;
}
textarea{
border: none;
text-align: center;
width: 60%;
margin-left: 50px;
}
#fill{
border: none;
border-bottom: 1px dotted black;
}
.noidung{
margin-left: 100px;
}
.btn1{
margin-left: 10px;
}
.btn-pdf{
  padding-right: 10px;
  float: right;
}
</style>
@endsection()
@section('script')
  <script type="text/javascript">
    $(".nav li.f4").children('ul').addClass("action");
    $(".nav li.f4").children('a').children('span').css("transform","rotate(-90deg)");
    $(".nav li ul").not(".action").css("display","none");
  </script>
@endsection
<!-- Page Content -->
@section('right-content')
<div id="page-wrapper" style="background-color: #e7e8e9" >
  <div class="container-fluid" >
    <!-- /.col-lg-12 -->
    <div class="a4">
      <page size="A4">
        <div class="tbtop">
          <table>
            <tr>
              <div class="tbleft">
                <td>
                    <textarea name="kyhieutrai" rows="2" cols="50" placeholder="Nhập Tên Trung Tâm"></textarea>
                    <div class="hr1"><hr style="margin-top: 10px"></div>
                </td>
              </div>
              
              <div class="tbright">
                <td>
                  CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                  <p id="tieungu">Độc Lập – Tự Do – Hạnh Phúc</p>
                  <hr style="width: 160px; padding-right: 100px">
                </td>
              </div>
              
            </tr>
          </table>
        </div>
        <!-- Tên Đơn -->
        <div class="row">
          <div class="tendon"><p><b>
          <textarea placeholder = "Nhập tên đơn" style="margin-left: 0px; margin-right: 15px"></textarea></b></p>
          
        </div>
      </div>
      <!-- Tên Đơn -->
      <!-- Lời chào -->
      <div class="row">
        <div class="loichao">
          <p><u><b>Kính gửi</b></u>: <input style="border: none; border-bottom: 1px dotted black; width:500px" type="text" name="trutri" ></p>
        </div>
      </div>
      <!-- Lời chào -->
      <!-- Đại Chỉ Chùa -->
      <div class="row">
        <div class="noidung">
          <table id="addcontent1" class="nguoigui" >
            <tr id="row">
              <td>
                <b><input name="inp_left0" type="text" style="border: none; border-bottom: 1px dotted black;width:100px">:</b></td>
                <td>
                  <input name="inp_right0" type=" text" style="border: none; border-bottom: 1px dotted black; width:500px">
                </td>
                <td>
                  <div class="btn1">
                    <button type="button" name="add1" id="add1" class="btn btn-success">+</button>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="noidung">
            <table id="addcontent2" class="nguoigui" >
              <tr id="row">
                <td>
                  <input name="nd1" type=" text" style="border: none; border-bottom: 1px dotted black; width:605px">
                </td>
                <td>
                  <div class="btn1">
                    <button type="button" name="add2" id="add2" class="btn btn-success">+</button>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <!-- ngày làm đơn -->

        <div class="row">
          <div id="ngaylamdon">
            <p> ...............,Ngày ........... tháng ........... năm ..........</p>
          </div>
        </div>
        <table style="padding-top: 30px">
          <thead>
            <tr>
              <div class="kytentrai">
                <th style="width: 500px"><textarea name="kytentrai" cols="20" rows="3" placeholder="ký tên trái"></textarea></th>
              </div>
              <div class="kytenphai">
                <th style="width: 400px"><textarea name="kytenphai" cols="20" rows="3" placeholder="ký tên phải"></textarea></th>
              </div>
            </tr>
          </thead>
        </table>
        <!-- ngày làm đơn -->
        <!-- <button onclick="myFunction()">Print this page</button>
        <script>
        function myFunction() {
        window.print();
        }
        </script> -->
        <div class="btn-pdf">
          <a href="{{ url('admin/vanban/getpdf1') }}" class="btn btn-danger">Convert into PDF</a>
        </div>
      </page>
    </div>
      <!-- /#page-wrapper -->
@endsection