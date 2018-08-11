	@extends('backend.layout')
	@section('title', 'Thêm user')
	@section('css')
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link href="{{asset("backend/plugins/timepicker/bootstrap-timepicker.min.css")}}" rel="stylesheet">
	<link href="{{asset("backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css")}}" rel="stylesheet">
	<link href="{{asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css")}}" rel="stylesheet">
	      <!-- <link href="{{asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker1.min.css")}}" rel="stylesheet">
	      	<link href="{{asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker2.min.css")}}" rel="stylesheet"> -->
	      	<link href="{{asset("backend/plugins/clockpicker/css/bootstrap-clockpicker.min.css")}}" rel="stylesheet">
	      	<link href="{{asset("backend/plugins/bootstrap-daterangepicker/daterangepicker.css")}}" rel="stylesheet">

	      	<link href="{{asset("backend/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
	      	<link rel="stylesheet" href="{{asset("backend/assets/css/bootstrap-example.min.css")}}" type="text/css">
	      	<link rel="stylesheet" href="{{asset("backend/assets/css/prettify.min.css")}}" type="text/css">
	      	<link rel="stylesheet" href="{{asset("backend/assets/css/photo.css")}}" type="text/css">
	      	<link rel="stylesheet" href="{{asset("backend/assets/css/custom.css")}}" type="text/css">

	      	<link href="{{asset("backend/assets/css/icons.css")}}" rel="stylesheet" type="text/css" />
	      	<link href="{{asset("backend/assets/css/style.css")}}" rel="stylesheet" type="text/css" />

	      	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	      	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	      	<script type="text/javascript" src="{{asset("backend/assets/js/photo.js")}}"></script>
	      	<script type="text/javascript" src="{{asset("backend/assets/js/prettify.min.js")}}"></script>
	      	<script type="text/javascript" src="{{asset("backend/assets/js/photo.js")}}"></script>
	      	<link href="{{asset("backend/assets/css/bootstrap-multiselect.css")}}" rel="stylesheet" type="text/css" />
	      	<script type="text/javascript" src="{{asset("backend/assets/js/bootstrap-multiselect.js")}}"></script>
	      	<script  src="{{asset("backend/assets/js/modernizr.min.js")}}"></script>
	      	@endsection

	      	@section('content')

	      	<div class="container-fluid">

	      		<!-- Page-Title -->
	      		<div class="row">
	      			<div class="col-sm-12">
	      				<div class="btn-group pull-right m-t-15">
	      					{{--<a href="{{ action('Backend\NewsController@category') }}" class="btn btn-default">--}}
	      						<i class="fa fa-plus"></i></a>
	      					</div>

	      					<h4 class="page-title">Thêm user</h4>
	      					<ol class="breadcrumb">
	      						<li class="breadcrumb-item">
	      							<a href="{{ action('Backend\TourGuideController@index') }}">Tour Guide</a></li>
	      							<li class="breadcrumb-item active">Thêm user</li>
	      						</ol>
	      					</div>
	      				</div>
	      				<form method="post" class="form-add" action="{{ action('Backend\FreeTourGuideController@check') }}">
	      					{{csrf_field()}}
	      					<div class="row">

	      						<div class="col-md-10 col-form">
	      							<div class="card-box">

	      								<div class="form-group">
	      									@include('backend.shared.flash-message')
	      								</div>
	      								<div class="card-box">
	      									<div class="row">
	      										<div class="col-md-12">
	      											<div class="form-group">
	      												<label for="start" class="text-uppercase" style="color: dodgerblue" >Tìm Tour Guide không bận trong khoảng</label>
	      												<div>
	      													<div class="input-daterange input-group" id="date-range">
	      														<input type="text" class="form-control" name="start" id="start" value="{{old('start')}}" />
	      														<input type="text" class="form-control" name="end"  id="end" value="{{old('end')}}" />
	      													</div>
	      												</div>
	      											</div>  
	      											<div class="form-group text-right m-b-0">
	      												<button class="btn btn-primary waves-effect waves-light" type="submit">Tìm</button>
	      											</div>
	      										</div>
	      										<div class="col-md-12">
													@if($free != null)
		      											<table class="table table-striped add-edit-table" id="datatable-editable">
		      												<thead>
		      													<tr>
		      														<th>Họ Tên</th>
		      														<th>Rank</th>
		      														<th>Trạng Thái</th>
		      														<th>Actions</th>
		      													</tr>
		      												</thead>
		      												<tbody>
		      													@foreach($free as $tourguide)
		      													<tr class="gradeX">
		      														<td>{{$tourguide->name}}</td>
		      														<td>{{$tourguide->class}}</td>
		      														@if($tourguide->status == 0)
		      														<td>tạm dừng</td>
		      														@endif
		      														@if($tourguide->status == 1)
		      														<td>hoạt động</td>
		      														@endif
		      														<input type="hidden" name="" value="{{$id =$tourguide->id}}">
		      														<td class="actions">
		      															<a href="{{ action('Backend\TourGuideController@show_skill',['id' => $id]) }}"  title="" data-original-title="Chi Tiết"><i class="fa fa-save"></i></a>
		      															<a href="{{ action('Backend\TourGuideController@edit',['id' => $id]) }}"  title="" data-original-title="Sửa"><i class="fa fa-edit"></i></a>
		      															<a href="{{ action('Backend\TourGuideController@destroy',['id'=>$id]) }}"  title="" data-original-title="Xóa"><i class="fa fa-trash-o"></i></a>

		      														</td>
		      													</tr>
		      													@endforeach
		      												</tbody>
		      											</table>	
													@endif
													@if($free == null)
													<span class="text-uppercase">Mọi người đều bận hết rồi :D</span>
													@endif
	      										</div>
	      									</div>
	      								</div>


	      								<input type="hidden" value="" name="list-roles" class="js-list-permission"/>

	      							</div> <!-- end card-box -->


	      						</div>
	      						<!-- end col -->



	      					</div>
	      				</form>
	      				<!-- end row -->

	      			</div> <!-- container -->

	      			@endsection

	      			@section('javascript')
	      			<script>
	      				var resizefunc = [];
	      			</script>
	      			<script src="{{ asset("backend/assets/js/jquery.min.js") }}"></script>
	      			<script src="{{ asset("backend/assets/js/popper.min.js")}}"></script><!-- Popper for Bootstrap -->
	      			<script src="{{asset("backend/assets/js/bootstrap.min.js")}}"></script>
	      			<script src="{{asset("backend/assets/js/detect.js")}}"></script>
	      			<script src="{{asset("backend/assets/js/fastclick.js")}}"></script>
	      			<script src="{{asset("backend/assets/js/jquery.slimscroll.js")}}"></script>
	      			<script src="{{asset("backend/assets/js/jquery.blockUI.js")}}"></script>
	      			<script src="{{asset("backend/assets/js/waves.js")}}"></script>
	      			<script src="{{asset("backend/assets/js/wow.min.js")}}"></script>
	      			<script src="{{asset("backend/assets/js/jquery.nicescroll.js")}}"></script>
	      			<script src="{{asset("backend/assets/js/jquery.scrollTo.min.js")}}"></script>


	      			<script src="{{asset("backend/plugins/moment/moment.js")}}"></script>
	      			<script src="{{asset("backend/plugins/timepicker/bootstrap-timepicker.js")}}"></script>
	      			<script src="{{asset("backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js")}}"></script>
	      			<script src="{{asset("backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js")}}"></script>
	      <!-- <script src="{{asset("backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker1.min.js")}}"></script>
	      	<script src="{{asset("backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker2.min.js")}}"></script> -->
	      	<script src="{{asset("backend/plugins/clockpicker/js/bootstrap-clockpicker.min.js")}}"></script>
	      	<script src="{{asset("backend/plugins/bootstrap-daterangepicker/daterangepicker.js")}}"></script>


	      	<script src="{{asset("backend/assets/js/jquery.core.js")}}"></script>
	      	<script src="{{asset("backend/assets/js/jquery.app.js")}}"></script>

	      	<script src="{{asset("backend/assets/pages/jquery.form-pickers.init.js")}}"></script>
	      	<script type="text/javascript" src="{{asset("backend/plugins/parsleyjs/parsley.min.js")}}"></script>
	      	@include('backend.shared.initjs')

	      	<script type="text/javascript">
	      		$(document).ready(function () {
	      			$('form').parsley();
	      		});
	      	</script>
	      	@endsection
