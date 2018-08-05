@extends('backend.layout')
@section('title', 'Thêm TourGuide')
@section('css')
      <link rel="stylesheet" href="{{asset("backend/plugins/magnific-popup/css/magnific-popup.css")}}" />
      <link rel="stylesheet" href="{{asset("backend/plugins/jquery-datatables-editable/dataTables.bootstrap4.min.css")}}" />

      <link href="{{asset("backend/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
     
      <link href="{{asset("backend/assets/css/icons.css")}}" rel="stylesheet" type="text/css" />
      <link href="{{asset("backend/assets/css/style.css")}}" rel="stylesheet" type="text/css" />
   
      <script  src="{{asset("backend/assets/js/modernizr.min.js")}}"></script>
@endsection

@section('content')
          <!-- ============================================================== -->
          <!-- Start right Content here -->
                <div class="container-fluid">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                      <div class="col-sm-8">
                                        <h4 class="page-title">Danh sách TourGuide</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{ action('Backend\TourGuideController@index') }} ">Tour Guide</a></li>
                                            <li class="breadcrumb-item active">Danh sách</li>
                                        </ol>                                         
                                      </div>
                                        <div class="col-sm-1">
                                            <div class="m-b-30">
                                               <a href="{{ action('Backend\TourGuideController@create') }} " class="btn btn-default">Thêm Mới</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-1">
                                            <div class="m-b-30">
                                               <a href="{{ action('Backend\TourGuideController@createAccount') }} " class="btn btn-default">Tạo tài khoản</a>
                                            </div>
                                        </div>
                                    </div>
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
                                        @foreach($tourguides as $tourguide)
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
                                </div>
                            </div>
                            <!-- end: page -->
                        </div> <!-- end Panel -->
                    </div> <!-- container -->


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
     

        <script src="{{asset("backend/plugins/magnific-popup/js/jquery.magnific-popup.min.js")}}"></script>
        <script src="{{asset("backend/plugins/datatables/jquery.dataTables.min.js")}}"></script>
        <script src="{{asset("backend/plugins/datatables/dataTables.bootstrap4.min.js")}}"></script>
        <script src="{{asset("backend/plugins/tiny-editable/mindmup-editabletable.js")}}"></script>
        <script src="{{asset("backend/plugins/tiny-editable/numeric-input-example.js")}}"></script>

        <!-- App js -->
        

        <script src="{{asset("backend/assets/js/jquery.core.js")}}"></script>
        <script src="{{asset("backend/assets/js/jquery.app.js")}}"></script>

        <script src="{{asset("backend/assets/pages/datatables.editable.init.js")}}"></script>

        <script>
            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        </script>
    
@endsection
