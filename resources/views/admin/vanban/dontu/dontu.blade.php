<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('') }} ">
    <script src="fontend_admin/jquery/jquery.min.js"></script>
    <script src="fontend_admin/jquery/jquery.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="fontend_admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- js map -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD57PRHJQSQ5XQOuNtAWpRBOP-UCX5pSzA&sensor=false"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!--Memuil Menu CSS -->

     <link href="fontend_admin/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!--css datatable //-->
   
    <link href="fontend_admin/datatables/css/jquery.dataTables.css" rel="stylesheet"> 
    
    <!-- Memu CSS -->
    <link href="fontend_admin/menu/css/sb-admin-2.css" rel="stylesheet">

    <!-- Các Icon - Fonts -->
    <link href="fontend_admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS  
    <link href="fontend_admin/dataTables/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
    <!-- DataTables Responsive CSS 
    <link href="fontend_admin/datatables-responsive/css/responsive.dataTables.css" rel="stylesheet">
-->
    <link href="fontend_admin/datatables-responsive/css/responsive.dataTables.min.css" rel="stylesheet">
            <!-- quan -->
<script>
        $(document).ready(function(){
        var i=0;
        $('#add1').click(function(){
        i++;
        $('#addcontent1').append('<tr id="row'+i+'"> <td><b><input name="inp_left'+i+'" type="text" style="border: none; border-bottom: 1px dotted black;width:100px">:</b></td> <td><input name="inp_right'+i+'" type=" text" style="border: none; border-bottom: 1px dotted black; width:500px"></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove0" style="margin-left:10px">-</button></td> </tr> ');
        });
        $(document).on('click', '.btn_remove0', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
        });
        $('#submit').click(function(){
        $.ajax({
        url:"name.php",
        method:"POST",
        data:$('#add_name').serialize(),
        success:function(data)
        {
        alert(data);
        $('#add_name')[0].reset();
        }
        });
        });
        });
</script>
<script>
        $(document).ready(function(){
        var i=0;
        $('#add2').click(function(){
        i++;
        $('#addcontent2').append('<tr id="row'+i+'"> <td><input name="nd'+i+'" type=" text" style="border: none; border-bottom: 1px dotted black; width:605px"></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_removeb" style="margin-left:10px">-</button></td> </tr> ');
        });
        $(document).on('click', '.btn_removeb', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
        });
        $('#submit').click(function(){
        $.ajax({
        url:"name.php",
        method:"POST",
        data:$('#add_name').serialize(),
        success:function(data)
        {
        alert(data);
        $('#add_name')[0].reset();
        }
        });
        });
        });
        </script>
        <!-- quan -->
<!-- Bootstrap Core JavaScript -->
    <script src="fontend_admin/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="fontend_admin/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Menu JavaScript -->
    <script src="fontend_admin/menu/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript-->
    <script src="fontend_admin/dataTables/js/jquery.dataTables.min.js" async></script>
    
    <!--Datatbles bootstrap  -->

    <script src="fontend_admin/dataTables/js/dataTables.bootstrap.min.js" async></script>
    
    <!-- phone sdt format -->

    <script src="fontend_admin/formBootstrap/js/bootstrap-formhelpers-phone.js" ></script>
    <script src="fontend_admin/formBootstrap/js/bootstrap-formhelpers-datepicker.js">
</script>
     <!-- Javascript Personal -->
<script src="fontend_admin/datatables-responsive/js/dataTables.responsive.min.js" type="text/javascript" async defer></script>
<script src="fontend_admin/script_custom/custom.js"></script>
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
@media print {
  #printPageButton {
    display: none;
  }
}
</style>
</head>
<body>
<!-- Page Content -->
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
                    <textarea name="kyhieutrai" rows="2" cols="50" placeholder="Nhập Tên Trung Tâm" id="kyhieutrai"></textarea>
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
          <textarea placeholder = "Nhập tên đơn" style="margin-left: 0px; margin-right: 15px" name="tendon" id="tendon"></textarea></b></p>
          
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
                <th style="width: 500px"><textarea name="kytentrai" cols="20" rows="3" placeholder="ký tên trái" id="kytentrai"></textarea></th>
              </div>
              <div class="kytenphai">
                <th style="width: 400px"><textarea name="kytenphai" cols="20" rows="3" placeholder="ký tên phải" id="kytenphai"></textarea></th>
              </div>
            </tr>
          </thead>
        </table>
        <!-- ngày làm đơn -->
        <button onclick="myFunction()">Print this page</button>
        <script>
        function myFunction() {
             placeholderVal = document.getElementById("tendon").placeholder;
     document.getElementById("tendon").placeholder = "";
            placeholderVal = document.getElementById("kyhieutrai").placeholder;
     document.getElementById("kyhieutrai").placeholder = "";
            placeholderVal = document.getElementById("kytentrai").placeholder;
     document.getElementById("kytentrai").placeholder = "";
            placeholderVal = document.getElementById("kytenphai").placeholder;
     document.getElementById("kytenphai").placeholder = "";
        window.print();
        }
        </script>
        <!-- <div class="btn-pdf">
          <button class="btn btn-danger" id="printPageButton" onClick="window.print();">Print</button>
        </div> -->
      </page>
    </div>
    </div>
  </div>
<!-- /#page-wrapper -->
</body>
</html>