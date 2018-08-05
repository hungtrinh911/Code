@extends('backend.layout')
@section('title', 'Cập nhật Sự kiện')
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

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">

                <h4 class="page-title">Cập nhật Sự kiện</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\EventController@index') }}">Sự kiện</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>

            </div>
        </div>

        <form method="post" class="form-add"
              action="{{ action('Backend\EventController@edit', array('id'=>$thing->id)) }}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{ $thing->id }}">
            <div class="row">
                <div class="col-lg-10">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" id="title" name="title" value="{{ $thing->title }}"
                                       parsley-trigger="change" required placeholder="Tiêu đề" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" id="slug" name="slug" value="{{ $thing->slug }}"
                                       parsley-trigger="change" required placeholder="Chuỗi đường dẫn tĩnh"
                                       class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <textarea id="excerpt" name="excerpt" class="form-control" rows="3"
                                          placeholder="Tóm tắt">{{ $thing->excerpt }}</textarea>
                            </div>

                            <div class="col-lg-3">
                                <div class="tags-default tags-beside-textarea">
                                    <input type="text" id="tags" name="tags" value="{{ $thing->tags }}"
                                           data-role="tagsinput"
                                           placeholder="thêm từ khóa"/>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="row h-100">
                                    <div class="col-lg-4">
                                        <button type="button" id="btn-select-img"
                                                class="btn btn-default waves-effect waves-light w-100 h-50"
                                                data-toggle="modal" data-target="#modal-select-img">
                                            Chọn ảnh
                                        </button>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="hidden" id="featured_img" name="featured_img"
                                               value="{{ $thing->featured_img }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <textarea id="content" name="content">{{ $thing->content }}</textarea>
                        </div>
                    </div>

                </div>
                <!-- end col -->

                <div class="col-lg-2">

                    <div class="card-box">

                        @include('backend.shared.flash-message')

                        <div class="form-group row">
                            <label for="locale" class="col-12 col-form-label">
                                Ngôn ngữ:
                                @foreach(\App\Helper::localeList() as $item)
                                    @if($thing->locale == $item->locale)
                                        {{ $item->name }}
                                    @endif
                                @endforeach
                            </label>
                            {{--<div>--}}
                            {{--<select id="locale" name="locale" class="selectpicker show-tick" data-style="btn-white">--}}
                            {{--@foreach(\App\Helper::localeList() as $item)--}}
                            {{--<option value="{{ $item->locale }}"--}}
                            {{--@if(\App\Helper::currentLocale() == $item->locale) selected @endif>--}}
                            {{--{{ $item->name }}--}}
                            {{--</option>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                            {{--</div>--}}
                        </div>

                        <div class="form-group">
                            <label for="locale_source_id">Bản dịch của</label>
                            <select id="locale_source_id" name="locale_source_id" class="selectpicker show-tick"
                                    data-style="btn-white">
                                @foreach(\App\Event::orphanList($thing->locale) as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-6 col-form-label">Trạng thái</label>
                            <input type="checkbox" id="status" name="status" data-plugin="switchery"
                                   data-color="#f05050" data-size="small"
                                   @if($thing->status == 'publish') checked @endif/>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Cập nhật
                            </button>
                        </div>

                    </div>

                </div>

            </div>
            <!-- end row -->
        </form>

    </div> <!-- container -->

    <div id="modal-select-img" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="full-width-modalLabel">Chọn ảnh</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <iframe style="width:100%;" height="500px" frameborder="0"
                            src="/backend/plugins/filemanager/dialog.php?type=1&field_id=featured_img&relative_url=1&multiple=0">
                    </iframe>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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

            reloadImages('featured_img', '');
        });

        function responsive_filemanager_callback(field_id) {
            reloadImages(field_id, '/{{ env('UPLOAD_FOLDER') }}/');
        }
    </script>
@endsection
