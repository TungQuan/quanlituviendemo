@extends('admincaptinh.layout.template')
@section('css')
<style type="text/css">
div.right-content{
margin-left:50px;
margin-top:15px;
}
.title-thead{
background-color: #DF3A01;
color: #FFFFFF;
font-size: 18px;
text-align: center;
border-radius: 20px 20px 0px 0px;
font-weight: bold;
}
.download{
color: #DF3A01;
padding:5px 0px 5px 0px;
}
.tbody{
background-color: white;
}
.tbody tr:hover{
font-weight: bold;
}
.center{
text-align: center;
}
</style>
@endsection
@section('script')
    <script type="text/javascript">

    $(".nav li.f4").children('ul').addClass("action");
    $(".nav li.f4").children('a').children('span').css("transform","rotate(-90deg)");
    $(".nav li ul").not(".action").css("display","none");
</script>
@endsection
<!-- Page Content -->
@section('right-content')
<div class="right-content">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Danh sách thông báo</li>
                    </ol>
                </nav>
                
            </div>
            @include('sweet::alert')
            <!-- /.col-lg-12 -->
            <div  class="row text-right" style="padding-bottom: 10px; padding-right: 10px">
                <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_modal" class="btn btn-warning">Thêm thông báo</button>
            </div>
            <div class="row">
                <div>
                    <table class="table table-bordered table-hover" id="table_vanban">
                        
                        <thead class="title-thead">
                            <tr>
                                <th class="center">STT</th>
                                <th >Tên Văn Bản</th>
                                <th>Công Văn Số</th>
                                <th>Ngày Nhận</th>
                                <th>Nơi phát hành</th>
                                <th>Nội dung tóm tắt</th>
                                <th>Ghi Chú </th>
                                <th class="center">Tải Về</th>
                                <th class="center">Sửa</th>
                                <th class="center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php $i=0; ?>
                            @foreach($vanban as $vb)
                            <?php $i++;?>
                            <tr>
                                <td class="center">{{$i}}</td>
                                <td>{{$vb->tenvanban}}</td>
                                <td>{{$vb->congvanso}}</td>
                                <td>{{$vb->ngaynhan}}</td>
                                <td>{{$vb->noiphathanh}}</td>
                                <td>{{$vb->noidungtomtat}}</td>
                                <td>{{$vb->ghichu}}</td>
                                <td  class="center"><a href="vanban/thongbao/{{$vb->vanban}}"><span class="glyphicon glyphicon-file fa-2x"></span></a></td>

                                <td><button class="btn btn-info btn-sm" type="button" name="edit" id="edit" data-toggle="modal" data-target="#edit_data_modal" data-tenvanban="{{$vb->tenvanban}}" data-congvanso="{{$vb->congvanso}}" data-ngaynhan="{{$vb->ngaynhan}}" data-noiphathanh="{{$vb->noiphathanh}}" data-noidungtomtat="{{$vb->noidungtomtat}}" data-ghichu="{{$vb->ghichu}}" data-idthongbao="{{$vb->id}}"> <span class="glyphicon glyphicon-edit"></span></button></td>

                                <td  class="center"><button class="btn btn-danger btn-sm" type="button" name="delete" id="delete" data-toggle="modal" data-target="#delete_data_modal" data-tenvanband="{{$vb->tenvanban}}" data-idthongbao="{{$vb->id}}"><span class="glyphicon glyphicon-trash"></span></button></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                    <div class="text-right" style="padding-right: 20px; margin-top: 0px"> 
                        {!!$vanban->links()!!}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    <div id="add_data_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ffc34d">
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                    <span id="thongbao"></span>
                    <h3 class="modal-title text-center" style="color: white"> Thêm Thông Báo</h3>

                </div>
                <div class="modal-body" style="background-color: #d1e0e0">
                    <form action="admincaptinh/vanban/uploadthongbaomodal" method="post" accept-charset="utf-8" id="insert_form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label>Tên văn bản: </label>
                        <input type="text" name="tenvanban" id="tenvanban" class="form-control" required pattern=".{3,100}" title="Tên văn bản phải có độ dài trên 3 ký tự"/>
                        <br/>
                        <label>Công văn số: </label>
                        <input type="text" name="congvanso" id="congvanso" class="form-control"/>
                        <br/>
                        <label>Nơi phát hành: </label>
                        <input type="text" name="noiphathanh" id="noiphathanh" class="form-control" required/>
                        <br/>
                        <label>Nội dung tóm tắt: </label>
                        <input type="text" name="noidungtomtat" id="noidungtomtat" class="form-control"/>
                        <br/>
                        <label>Ghi chú: </label>
                        <input type="text" name="ghichu" id="ghichu" class="form-control"/>
                        <br/>
                        <label>Chọn văn bản: </label>
                        <input type="file" name="vanban" id="vanban" class="form-control" required/>
                        <br/>
                        <input type="submit" name="them" id="them" value="Thêm thông báo" class="btn btn-success">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_data_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ffc34d">
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                    <span id="thongbao"></span>
                    <h3 class="modal-title text-center" style="color: white"> Sửa Thông Báo</h3>

                </div>
                <div class="modal-body" style="background-color: #d1e0e0">
                    <form action="admincaptinh/vanban/suathongbao" method="post" accept-charset="utf-8" id="insert_form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label>Tên văn bản: </label>
                        <input type="text" name="tenvanban" id="tenvanban" class="form-control" required pattern=".{3,100}" title="Tên văn bản phải có độ dài trên 3 ký tự"/>
                        <br/>
                        <label>Công văn số: </label>
                        <input type="text" name="congvanso" id="congvanso" class="form-control"/>
                        <br/>
                        <label>Nơi phát hành: </label>
                        <input type="text" name="noiphathanh" id="noiphathanh" class="form-control" required/>
                        <br/>
                        <label>Nội dung tóm tắt: </label>
                        <input type="text" name="noidungtomtat" id="noidungtomtat" class="form-control"/>
                        <br/>
                        <label>Ghi chú: </label>
                        <input type="text" name="ghichu" id="ghichu" class="form-control"/>
                        <br/>
                        <label>Chọn văn bản: </label>
                        <input type="file" name="vanban" id="vanban" class="form-control"/>
                        <input type="hidden" name="idthongbao" id="idthongbao" class="form-control"/>
                        <br/>
                        <input type="submit" name="them" id="them" value="Lưu thay đổi" class="btn btn-success">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <div id="delete_data_modal" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ff3333">
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                    <span id="thongbao"></span>
                    <h3 class="modal-title text-center" style="color: white"> Xóa Thông Báo</h3>

                </div>
                <form action="admincaptinh/vanban/xoathongbao" method="post" accept-charset="utf-8" id="insert_form" enctype="multipart/form-data">
                <div class="modal-body" style="background-color: #f0f5f5">
                    
                        {{csrf_field()}}
                        <label><h4>Bạn có thật sự muốn xóa?</h4></label>
                        <input type="hidden" name="idthongbao" id="idthongbao" class="form-control"/>
                        <br/>
                    
                </div>
                <div class="modal-footer" style="background-color: #f0f5f5">
                    <input type="submit" name="xoa" id="xoa" value="Xóa" class="btn btn-success">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<script>
    //--EDIT DATA
    $('#edit_data_modal').on('show.bs.modal', function (event) {
        var button=$(event.relatedTarget)
        var tenvanban=button.data('tenvanban')
        var congvanso=button.data('congvanso')
        var noiphathanh=button.data('noiphathanh')
        var noidungtomtat=button.data('noidungtomtat')
        var ghichu=button.data('ghichu')
        var idthongbao=button.data('idthongbao')
        var modal=$(this)
        modal.find('.modal-body #tenvanban').val(tenvanban)
        modal.find('.modal-body #congvanso').val(congvanso)
        modal.find('.modal-body #noiphathanh').val(noiphathanh)
        modal.find('.modal-body #noidungtomtat').val(noidungtomtat)
        modal.find('.modal-body #ghichu').val(ghichu)
        modal.find('.modal-body #idthongbao').val(idthongbao)
    //---EDIT DATA
    });

    //---DELETE DATA
    $('#delete_data_modal').on('show.bs.modal', function (event) {
        var button=$(event.relatedTarget)
        var tenvanband=button.data('tenvanband')
        var idthongbao=button.data('idthongbao')
        var modal=$(this)
        modal.find('.modal-body #tenvanband').val(tenvanband)
        modal.find('.modal-body #idthongbao').val(idthongbao)
    })
    //---DELETE DATA
    
</script>
<!-- /#page-wrapper -->
@endsection