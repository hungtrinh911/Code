@extends('backend.layout')
@section('title', 'Tùy chỉnh thông tin')
@section('css')
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/switchery/css/switchery.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/multiselect/css/multi-select.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/select2/css/select2.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css") }}"/>
    <link rel="stylesheet"
          href="{{ asset("backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/jstree/style.css") }}"/>

    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/custom.css") }}"/>

    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')

    <div class="container-fluid">

        <form method="post" class="form-add" action="{{ action('Backend\OptionController@edit') }}">
        @csrf

        <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="btn-group pull-right m-t-15">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Cập nhật
                        </button>
                    </div>
                    <h4 class="page-title">Tùy chỉnh thông tin</h4>
                    <ol class="breadcrumb">
                        {{--<li class="breadcrumb-item"><a href="#">Ubold</a></li>--}}
                        {{--<li class="breadcrumb-item"><a href="#">Forms</a></li>--}}
                        {{--<li class="breadcrumb-item active">X Editable</li>--}}
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @include('backend.shared.flash-message')
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#basic" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                Cơ bản
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#seo" data-toggle="tab" aria-expanded="false" class="nav-link">
                                SEO
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#social" data-toggle="tab" aria-expanded="false" class="nav-link">
                                Mạng xã hội
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td width="35%">Tên website</td>
                                    <td width="65%">
                                        <input type="text" id="site_name" name="site_name" class="form-control"
                                               value="{{ $option->site_name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Đường dẫn website</td>
                                    <td>
                                        <input type="text" id="site_url" name="site_url" class="form-control"
                                               value="{{ $option->site_url }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Favicon (biểu tượng trên thanh trình duyệt)</td>
                                    <td>
                                        <div class="row h-100">
                                            <div class="col-lg-2">
                                                <button type="button" id="btn-select-site-icon"
                                                        class="btn btn-default waves-effect waves-light w-100"
                                                        data-toggle="modal" data-target="#modal-select-site-icon">
                                                    Chọn icon
                                                </button>
                                            </div>
                                            <div class="col-lg-10">
                                                <input type="hidden" id="site_icon" name="site_icon"
                                                       value="{{ $option->site_icon }}">
                                            </div>
                                            <div id="modal-select-site-icon" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn
                                                                icon</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id=site_icon&relative_url=1&multiple=0">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Danh sách logo</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-2 h-100">
                                                <button type="button" id="btn-select-site-logos"
                                                        class="btn btn-default waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target="#modal-select-site-logos">
                                                    Chọn logo
                                                </button>
                                            </div>
                                            <div class="col-lg-10">
                                                <input type="hidden" id="site_logos" name="site_logos"
                                                       value="{{ $option->site_logos }}">
                                            </div>
                                            <div id="modal-select-site-logos" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn
                                                                logo</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id=site_logos&relative_url=1&multiple=1">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Thông tin copyright</td>
                                    <td>
                                        <input type="text" id="site_copyright" name="site_copyright"
                                               class="form-control"
                                               value="{{ $option->site_copyright }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>
                                        <input type="text" id="site_address" name="site_address" class="form-control"
                                               value="{{ $option->site_address }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số Hotline</td>
                                    <td>
                                        <input type="text" id="site_hotline" name="site_hotline" class="form-control"
                                               value="{{ $option->site_hotline }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số máy bàn văn phòng</td>
                                    <td>
                                        <input type="text" id="site_telephone" name="site_telephone"
                                               class="form-control"
                                               value="{{ $option->site_telephone }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ email</td>
                                    <td>
                                        <input type="text" id="site_email" name="site_email" class="form-control"
                                               value="{{ $option->site_email }}">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="seo">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td width="35%">Tiêu đề mặc định</td>
                                    <td width="65%">
                                        <input type="text" id="site_title" name="site_title" class="form-control"
                                               value="{{ $option->site_title }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mô tả site</td>
                                    <td>
                                    <textarea id="site_description" name="site_description" class="form-control"
                                              rows="3"
                                              placeholder="">{{ $option->site_description }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Từ khóa</td>
                                    <td>
                                        <input type="text" id="site_keywords" name="site_keywords"
                                               value="{{ $option->site_keywords }}"
                                               data-role="tagsinput" class="form-control"
                                               placeholder="thêm từ khóa"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ảnh mặc định website</td>
                                    <td>
                                        <div class="row h-100">
                                            <div class="col-lg-2">
                                                <button type="button" id="btn-select-site-image"
                                                        class="btn btn-default waves-effect waves-light w-100"
                                                        data-toggle="modal" data-target="#modal-select-site-image">
                                                    Chọn icon
                                                </button>
                                            </div>
                                            <div class="col-lg-10">
                                                <input type="hidden" id="site_image" name="site_image"
                                                       value="{{ $option->site_image }}">
                                            </div>
                                            <div id="modal-select-site-image" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn
                                                                ảnh</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id=site_image&relative_url=1&multiple=0">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Google Analytics Tracking ID</td>
                                    <td>
                                        <input type="text" id="gg_analytics_tracking_id" name="gg_analytics_tracking_id"
                                               class="form-control"
                                               value="{{ $option->gg_analytics_tracking_id }}">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="social">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td width="35%">Facebook AppID</td>
                                    <td width="65%">
                                        <input type="text" id="fb_app_id" name="fb_app_id" class="form-control"
                                               value="{{ $option->fb_app_id }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Facebook Page</td>
                                    <td>
                                        <input type="text" id="fb_page_link" name="fb_page_link" class="form-control"
                                               value="{{ $option->fb_page_link }}">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </form>
    </div> <!-- container -->

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
            reloadImages('site_icon', '');
            reloadImages('site_logos', '');
            reloadImages('site_image', '');
        });

        function responsive_filemanager_callback(field_id) {
            reloadImages(field_id, '/{{ env('UPLOAD_FOLDER') }}/');
        }
    </script>
@endsection
