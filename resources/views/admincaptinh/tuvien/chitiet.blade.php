@extends('admincaptinh.layout.template')
@section('css')
<style type="text/css">
	div.right-content{
		margin-left:50px;
		margin-top:15px;
        position: relative;
	}

</style>
@endsection
@section('script')
<script type="text/javascript">
$(".nav li.f3").children('ul').addClass("action");
	$(".nav li.f3").children('a').children('span').css("transform","rotate(-90deg)");
	$(".nav li ul").not(".action").css("display","none");
	</script>
@endsection
@section('content')
<div class="right-content"></div>
@endsection