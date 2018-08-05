@extends('backend.layout')
@section('title', 'Thêm TourGuide')
@section('css')
     <!--  <link href="backend/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
      <link href="backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
      <link href="backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
      <link href="backend/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
      <link href="backend/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> -->
      <link href="{{asset("backend/assets/css/bootstrap.css")}}" rel="stylesheet" type="text/css" />
      <link href="{{asset("backend/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
      
      <link rel="stylesheet" href="{{asset("backend/assets/css/bootstrap-example.min.css")}}" type="text/css">
      <link rel="stylesheet" href="{{asset("backend/assets/css/prettify.min.css")}}" type="text/css">
      <link rel="stylesheet" href="{{asset("backend/assets/css/photo.css")}}" type="text/css">
      <link rel="stylesheet" href="{{asset("backend/assets/css/custom.css")}}" type="text/css">
      <link rel="stylesheet" href="{{asset("backend/assets/css/profile.min.css")}}" type="text/css">
      <link rel="stylesheet" href="{{asset("backend/assets/css/ticket.min.css")}}" type="text/css">
      <link rel="stylesheet" href="{{asset("backend/plugins/magnific-popup/css/magnific-popup.css")}}"/>
      <link href="{{asset("backend/assets/css/icons.css")}}" rel="stylesheet" type="text/css" />
      <link href="{{asset("backend/assets/css/style.css")}}" rel="stylesheet" type="text/css" />
      <link href="{{asset("backend/assets/css/custom.css")}}" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="{{asset("backend/assets/js/photo.js")}}"></script>
      <script type="text/javascript" src="{{asset("backend/assets/js/prettify.min.js")}}"></script>
      <script type="text/javascript" src="{{asset("backend/assets/js/photo.js")}}"></script>
      <link href="{{asset("backend/assets/css/bootstrap-multiselect.css")}}" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="{{asset("backend/assets/js/bootstrap-multiselect.js")}}"></script>
      <script  src="{{asset("backend/assets/js/modernizr.min.js")}}"></script>
      @endsection

      @section('content')
      <!-- ============================================================== -->
      <!-- Start right Content here -->
        <div style="display: none;">  {{$img_cv = $tourguides->img_cv }}</div>
        <div style="display: none;">  {{$ids = $tourguides->id }}</div>
        <div style="display: none;">  {{$id_cmt = $comment->id }}</div>
       
      <div class="container-fluid">
        <!-- Page-Title -->
        <ul class="page-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="{{action('Backend\BackendController@dashboard')}}"><i class="fa fa-home"></i>Bảng Tin</a></li>
          <li class="breadcrumb-item"><a href="{{action('Backend\TourGuideController@index')}}">TourGuide</a></li>
           <li class="breadcrumb-item"><a href="{{action('Backend\CommentController@showComment',['id'=>$ids])}}">Comment</a></li>
          <li class="breadcrumb-item active">Sửa Comment</li>
        </ul>
        <div class="row">
          <div class="col-md-12">
            <div class="profile-sidebar">
        <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet bordered">
                <div class="profile-userpic">
                  <img  src="{{asset("images/$img_cv")}}" class="rounded-circle" alt="{{$tourguides->name}}">
                </div>
                <div class="profile-usertitle">
                  <div class="profile-usertitle-name">{{$tourguides->name}}</div>
                  <div class="profile-usertitle-job">{{$tourguides->class}}</div>
                </div>
                
                <div class="profile-userbuttons">
                  <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Nâng cấp</button>
                  <button type="button" class="btn btn-info btn-rounded waves-effect waves-light">Khóa</button>
                </div>
               
                <div class="profile-usermenu">
                  <ul class="">
                    <li><a href="{{action('Backend\TourGuideController@showprofile',['id'=>$ids])}}"><i class="fa fa-home" "></i>Thông Tin Cá Nhân</a></li>
                    <li><a href="{{ action('Backend\TourGuideController@show_skill',['id' => $ids]) }}"><i class="fa fa-cog "></i>Kĩ Năng Nghề Nghiệp</a></li>
                    <li><a href="{{action('Backend\CommentController@showComment',['id'=>$ids])}}"><i class="fa fa-comments "></i>Comment</a></li>
                  </ul>
                </div>
            </div>
      <!--END-->
            <div class="portlet light bordered">
      <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 37 </div>
                        <div class="uppercase profile-stat-text"> Comments </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 51 </div>
                        <div class="uppercase profile-stat-text"> Views </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 61 </div>
                        <div class="uppercase profile-stat-text"> Votes </div>
                    </div>
                </div>
                <!-- END STAT -->
             
            </div>
          </div>
           



          <div class="app-ticket app-ticket-details">
            <div class="card-box">
               <div class="col-md-12">@include('backend.shared.flash-message')</div>
              <label for="" class="text-uppercase" style="color: dodgerblue">Thông Tin Comment <i class="fa fa-edit"></i></label>
              <hr>
                 <form enctype= "multipart/form-data"  method="post" class="form-add" action="{{ action('Backend\CommentController@showEditCommentForm',['id' => $id_cmt ]) }}" >
                                       {{csrf_field()}}
                                  <div class="row">
                                      <div class="col-md-5">
                                           <div class="form-group row">
                                              <label class="col-md-3 col-form-label">Họ tên</label>
                                              <div class="col-8">
                                                 <input type="text" class="form-control" id='name' name="name"
                                                 placeholder="" value="{{$comments->name}}" disabled />
                                              </div>
                                          </div>
                                      </div>
                                       <div class="col-md-5">
                                           <div class="form-group row">
                                                <label for="" class="col-3 col-form-label">Trạng thái</label>
                                                  <div class="col-9 m-t-5"> 
                                                    <label class="radio-inline">
                                                      <input type="radio" name="status" id="0" value="0" class="status">ẩn
                                                  </label>
                                                  <label class="radio-inline">
                                                      <input type="radio" name="status" id="1" value="1" class="status">hiện
                                                  </label>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                          <div class="col-md-10">
                                            <div class="form-group">
                                            <label for="" >Comment :<span class="text-danger"></span></label>
                                              <textarea  class="form-control" id="comment" name="comment" disabled> {{$comments->comment}}</textarea>
                                            </div>
                                          </div>
                                  </div>
                                   <div class="form-group">
                                          <div>
                                              <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                  Lưu
                                              </button>
                                          </div>
                                      </div>

                  </form>
            </div>
          </div>
</div>


</div> <!-- content -->


</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<!-- Right Sidebar -->

</div>

<!-- END wrapper -->
@endsection

@section('javascript')
<script>
  var resizefunc = [];
</script>

<!-- jQuery  -->
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
<script src="{{asset("backend/plugins/clockpicker/js/bootstrap-clockpicker.min.js")}}"></script>
<script src="{{asset("backend/plugins/bootstrap-daterangepicker/daterangepicker.js")}}"></script>


<script src="{{asset("backend/assets/js/jquery.core.js")}}"></script>
<script src="{{asset("backend/assets/js/jquery.app.js")}}"></script>

<script src="{{asset("backend/assets/pages/jquery.form-pickers.init.js")}}"></script>
<script type="text/javascript" src="{{asset("backend/plugins/parsleyjs/parsley.min.js")}}"></script>

<script type="text/javascript">
  console.log()
  $(document).ready(function() {
    $('form').parsley();
     var status = "{{$comments->status}}";
     var array_status = JSON.parse("[" + status + "]");
              $( ".status" ).each(function( index, element ) {
               var a = $(this).attr('id');
               var b=a-1;
               var c=b+1; ///??????????
               var array_status1 = array_status.indexOf(c);
               var $input = $( this );
               if( array_status1 >=0 )
                 $input.prop("checked",true);
               else  
                 $input.prop("checked",false);
             });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#language').multiselect();
  });
</script>
@endsection
