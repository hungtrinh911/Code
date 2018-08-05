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
      <link href="{{asset("backend/assets/css/components-md.min.css")}}" rel="stylesheet" type="text/css" />

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
        <div style="display: none;">  {{$img_cd = $tourguides->img_cd }}</div>
        <div style="display: none;">  {{$img_full = $tourguides->img_full }}</div>
        <div style="display: none;">  {{$ids = $tourguides->id }}</div>
      <div class="container-fluid">
        <!-- Page-Title -->
        <ul class="page-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="{{action('Backend\BackendController@dashboard')}}"><i class="fa fa-home"></i>Bảng Tin</a></li>
          <li class="breadcrumb-item"><a href="{{action('Backend\TourGuideController@index')}}">TourGuide</a></li>
          <li class="breadcrumb-item active">Thông tin TourGuide</li>
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
                  <a href="{{action('Backend\TourGuideController@edit',['id'=>$ids])}}" class="btn btn-circle green btn-sm">Nâng cấp</a>
                 <!--  <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light"><a href="">Nâng cấp</a></button> -->
                  <button type="button" id="btnUnblock" class="btn btn-circle red btn-sm" style="display: inline-block;">khóa</button>
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
                        <div class="uppercase profile-stat-title"> {{count($comments)}} </div>
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
              <label for="" class="text-uppercase" style="color: dodgerblue">Thông Tin Cá Nhân <i class="fa fa-edit"></i></label>
              <hr>
              <div class="row profile"> 
                <div class="col-md-6">
                  <div class="">
                    <span class="bold">Địa chỉ :</span>
                    {{$tourguides->address}}
                  </div>
                </div>
                <div class="col-md-6"><div><span class="bold">Loại thẻ :</span>
                  {{$tourguides->LicensedType}}
                </div>
              </div>
            </div>                                                 
            <div class="row profile"> 
             <div class="col-md-6">
              <div>
                <span class="bold">Ngày sinh :</span>
                {{$tourguides->dob}}
              </div>
            </div>
            <div class="col-md-6">
              <div>
                <span class="bold">Ngày tham gia :</span> {{$tourguides->join_date}}
              </div>
            </div>
          </div>                                                 
          <div class="row profile">
            <div class="col-md-6">
              <div>
                <span class="bold">Mobile :</span> {{$tourguides->phone}}
              </div>
            </div>
            <div class="col-md-6">
              <div>
                <span class="bold">Email :</span> {{$tourguides->email}}
              </div>
            </div>
          </div>                                                 
          <div class="row profile"> 
           <div class="col-md-6">
            <div>
              <span class="bold">Số thẻ :</span> {{$tourguides->card_id}}</div>
            </div>
            <div class="col-md-6">
              <div>
                <span class="bold">Ngày hết hạn thẻ :</span> {{$tourguides->date_end}}
              </div>
            </div>
          </div>                                                 
          <div class="row profile"> 
            <div class="col-md-12">
              <div>
                <span class="bold"><i class="fa fa-edit "></i> Bio :</span>
                {{$tourguides->introduce}}
              </div>
            </div>
          </div>                                                 
          <div class="port">
            <div class="portfolioContainer ">
              <div class="row">
                <div class="col-sm-3 col-lg-3 col-md-3  ">
                  <div class=" thumb">
                    <img src="{{asset("images/$img_cv")}}" class="thumb-img" alt="work-thumbnail">
                  </div>
                </div>
                <div class="col-sm-3 col-lg-3 col-md-3 ">
                  <div class=" thumb">

                    <img src="{{asset("images/$img_cd")}}" class="thumb-img" alt="work-thumbnail">
                  </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3 ">
                  <div class="thumb">
                    <img src="{{asset("images/$img_full")}}" class="thumb-img" alt="work-thumbnail">
                  </div>
                </div>
              </div>
            </div>
          </div>   




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
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#language').multiselect();
  });
</script>
@endsection
