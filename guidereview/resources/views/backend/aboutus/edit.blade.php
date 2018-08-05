@extends('backend.layout')
@section('title', 'Sửa ')
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
          <li class="breadcrumb-item"><a href="{{action('Backend\AboutUsController@show')}}">About us</a></li>
          <li class="breadcrumb-item active">Sửa About us</li>
        </ul>
      
        <div class="row">
          <div class="col-md-12">
            <div class="card-box">
              <label for="" class="text-uppercase" style="color: dodgerblue">Thông Tin  <i class="fa fa-edit"></i></label>
              <hr>   <div style="display: none;">  {{$key = $aboutus->key }}</div>
                 <form enctype= "multipart/form-data"  method="post" class="form-add" action="{{ action('Backend\AboutUsController@showEditForm',['key' => $key ]) }}" >
                                       {{csrf_field()}}
                                  <div class="col-md-10">@include('backend.shared.flash-message')</div>
                                  <div class="row">
                                         <div class="col-md-10">
                                           <div class="form-group">
                                                <label for="">Nội Dung</label>
                                               <textarea name="value" id="content">{{$aboutus->value}}</textarea>
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
    <script src="{{ asset("backend/assets/js/popper.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/detect.js") }}"></script>
    <script src="{{ asset("backend/assets/js/fastclick.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.slimscroll.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.blockUI.js") }}"></script>
    <script src="{{ asset("backend/assets/js/waves.js") }}"></script>
    <script src="{{ asset("backend/assets/js/wow.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.nicescroll.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.scrollTo.min.js") }}"></script>

    <script src="{{ asset("backend/plugins/jstree/jstree.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/switchery/js/switchery.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/multiselect/js/jquery.multi-select.js") }}"></script>
    <script src="{{ asset("backend/plugins/jquery-quicksearch/jquery.quicksearch.js") }}"></script>
    <script src="{{ asset("backend/plugins/select2/js/select2.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-select/js/bootstrap-select.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/tinymce/tinymce.min.js") }}"></script>

    <script src="{{ asset("backend/assets/js/jquery.core.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.app.js") }}"></script>
    @include('backend.shared.initjs')

    <script type="text/javascript">
        $(document).ready(function () {
            $("#content").richer('#content');
            $('#title').slugify({target: '#slug'});

        });

        function responsive_filemanager_callback(field_id) {
            reloadImages(field_id, '/{{ env('UPLOAD_FOLDER') }}/');
        }
    </script>
@endsection
