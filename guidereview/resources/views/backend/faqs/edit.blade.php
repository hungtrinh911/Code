@extends('backend.layout')
@section('title', 'Thêm Faqs')
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
     
      <div class="container-fluid">
        <!-- Page-Title -->
        <ul class="page-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="{{action('Backend\BackendController@dashboard')}}"><i class="fa fa-home"></i>Bảng Tin</a></li>
          <li class="breadcrumb-item"><a href="{{action('Backend\FaqsController@showFaqs')}}">Faqs</a></li>
          <li class="breadcrumb-item active">Sửa Faqs</li>
        </ul>
        <div style="display: none;">  {{$ids = $faqs->id }}</div>
        <div class="row">
        <div class="col-md-12">@include('backend.shared.flash-message')</div>
          <div class="col-md-12">
            <div class="card-box">
              <label for="" class="text-uppercase" style="color: dodgerblue">Thông Tin Faqs <i class="fa fa-edit"></i></label>
              <hr>

                 <form enctype= "multipart/form-data"  method="post" class="form-add" action="{{ action('Backend\FaqsController@showEditFaqsForm',['id' => $ids ]) }}" >
                                       {{csrf_field()}}
                                  <div class="row">
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
                                              <label>Câu hỏi</label>
                                              <div>
                                                <textarea  class="form-control" id="question" name="question">{{$faqs->question}}</textarea>
                                              </div>
                                            </div>
                                      </div>

                                      <div class="col-md-10">
                                           <div class="form-group">
                                            <label>Trả lời</label>
                                            <div>
                                              <textarea  class="form-control" id="answer" name="answer">{{$faqs->answer}}</textarea>
                                            </div>
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
     var status = "{{$faqs->status}}";
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
