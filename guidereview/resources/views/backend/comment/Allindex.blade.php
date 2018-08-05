@extends('backend.layout')
@section('title', 'Danh Sách Comment')
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
                                      <div class="col-sm-10">
                                        <h4 class="page-title">Danh sách comment</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{ action('Backend\CommentController@showAllComment') }} ">Comment</a></li>
                                            <li class="breadcrumb-item active">Danh sách</li>
                                        </ol>                                         
                                      </div>
                                    </div>
                                    <table class="table table-striped add-edit-table" id="datatable-editable">
                                        <thead>
                                        <tr>
                                            <th>Họ Tên</th>
                                            <th>Nội Dung</th>
                                            <th>Trạng Thái</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($comments as $comment)
                                        <tr class="gradeX">
                                            <td>{{$comment->name}}</td>
                                            <td>{{$comment->comment}}</td>
                                            @if($comment->status == 0)
                                            <td>ẩn</td>
                                            @endif
                                            @if($comment->status == 1)
                                            <td>hiện</td>
                                            @endif
                                            <input type="hidden" name="" value="{{$id =$comment->id}}">
                                            <td class="actions">
                                               <a href="{{ action('Backend\CommentController@showEditAllCommentForm',['id' =>$id]) }}"  title="" data-original-title="Chi Tiết"><i class="fa fa-edit"></i></a>
                                               <a href="{{ action('Backend\CommentController@destroy',['id' =>$id]) }}"  title="" data-original-title="Xoa"><i class="fa fa-trash"></i></a>
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
