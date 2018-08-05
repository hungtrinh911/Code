@extends('backend.layout')
@section('title', 'Thêm quyền')
@section('css')
    {{--<link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css") }}"/>--}}
    {{--<link rel="stylesheet" href="{{ asset("backend/plugins/switchery/css/switchery.min.css") }}"/>--}}
    {{--<link rel="stylesheet" href="{{ asset("backend/plugins/multiselect/css/multi-select.css") }}"/>--}}
    {{--<link rel="stylesheet" href="{{ asset("backend/plugins/select2/css/select2.min.css") }}"/>--}}
    {{--<link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css") }}"/>--}}
    {{--<link rel="stylesheet" href="{{ asset("backend/plugins/jstree/style.css") }}"/>--}}

    {{--<link rel="stylesheet"--}}
    {{--href="{{ asset("backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css") }}"/>--}}
    {{--<link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>--}}
    {{--<link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-table/css/bootstrap-table.min.css") }}"/>--}}

    {{--<link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>--}}
    {{--<link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>--}}
    {{--<link rel="stylesheet" href="{{ asset("backend/assets/css/custom.css") }}"/>--}}
    {{--<script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>--}}
    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-table/css/bootstrap-table.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/jstree/style.css") }}"/>

    <link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
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

                <h4 class="page-title">Thêm quyền</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\RoleController@index') }}">Quyền</a></li>
                    <li class="breadcrumb-item active">Thêm quyền</li>
                </ol>

            </div>
        </div>
        <form method="post" class="form-add" action="{{ action('Backend\RoleController@add') }}">
           {{csrf_field()}}
        <div class="row">

                <div class="col-lg-4 col-form">
                    <div class="card-box">


                        {{--<input type="hidden" id="id" name="id" value="{{ $term->id }}">--}}

                        <div class="form-group">
                            @include('backend.shared.flash-message')
                        </div>

                        <div class="form-group">
                            <label for="name">Tên<span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="slug">Chuỗi đường dẫn tĩnh<span class="text-danger">*</span></label>
                            <input type="text" id="slug" name="slug" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ old('slug') }}">
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Thêm</button>
                        </div>


                        <input type="hidden" value="" name="list-permission" class="js-list-permission"/>


                    </div> <!-- end card-box -->


                </div>
                <!-- end col -->

                <div class="col-lg-8 col-grid">
                    <div class="card-box">
                        {{--permission-list--}}
                        <h4 class="m-t-0 header-title">Danh sách quyền</h4>
                        <hr>

                        <div id="checkTree"
                             class="jstree jstree-1 jstree-default jstree-checkbox-selection jstree-closed"
                             role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_1"
                             aria-busy="false">
                            <ul class="jstree-container-ul jstree-children" role="group">

                                @foreach (\App\Permission::getAll(true,0) as $item)

                                    <li role="treeitem" aria-selected="false" aria-level="1"
                                        aria-labelledby="j1_1_anchor"
                                        aria-expanded="true" id="{{$item->id}}" class="jstree-node  jstree-open"><i
                                                class="jstree-icon jstree-ocl" role="presentation"></i><a
                                                class="jstree-anchor"
                                                href="#" tabindex="-1"
                                                id="j1_1_anchor-{{$item->id}}"><i
                                                    class="jstree-icon jstree-checkbox jstree-undetermined"
                                                    role="presentation"></i><i
                                                    class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom"
                                                    role="presentation"></i> {{ $item->name  }}
                                        </a>

                                        {{--sub perrmission--}}
                                        {{--{{ $temp = (array)json_decode($item->metadata) }}--}}
                                        @if (array_key_exists('hasChild', (array)json_decode($item->metadata))) {
                                        <ul role="group" class="jschildren">
                                            @php($childPermissions = \App\Permission::getAll(false,$item->id))
                                            @foreach ($childPermissions as $subitem)
                                                <li role="treeitem" data-jstree="{&quot;opened&quot;:true}"
                                                    aria-selected="false"
                                                    aria-level="2" aria-labelledby="j1_2_anchor" aria-expanded="true"
                                                    id="{{$subitem->id}}" class="jstree-node  jstree-open">
                                                    <i class="jstree-icon jstree-ocl" role="presentation"></i>
                                                    <a class="jstree-anchor" href="#" tabindex="-1"
                                                       id="j1_2_anchor-{{$subitem->id}}">
                                                        <i class="jstree-icon jstree-checkbox jstree-undetermined"
                                                           role="presentation"></i>
                                                        <i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom"
                                                           role="presentation"></i>{{$subitem->name}}
                                                    </a>

                                                </li>
                                            @endforeach
                                        </ul>
                                        }
                                        @endif

                                        {{--end sub permission--}}
                                    </li>



                                    {{--<li role="treeitem" data-jstree="{&quot;type&quot;:&quot;file&quot;}" aria-selected="false"--}}
                                    {{--aria-level="1" aria-labelledby="j1_17_anchor" id="j1_17"--}}
                                    {{--class="jstree-node  jstree-leaf jstree-last"><i class="jstree-icon jstree-ocl"--}}
                                    {{--role="presentation"></i><a--}}
                                    {{--class="jstree-anchor" href="#" tabindex="-1" id="j1_17_anchor"><i--}}
                                    {{--class="jstree-icon jstree-checkbox" role="presentation"></i><i--}}
                                    {{--class="jstree-icon jstree-themeicon fa fa-file jstree-themeicon-custom"--}}
                                    {{--role="presentation"></i>Frontend</a></li>--}}

                                @endforeach

                            </ul>


                        </div>
                        {{--end-permission-list--}}
                        {{--@if(Auth::user()->can('delete-permission'))--}}
                        {{--<button id="grid-btn-delete-multi" class="btn btn-danger"--}}
                        {{--data-toggle="modal" data-target=".modal-delete" disabled>--}}
                        {{--<i class="fa fa-times m-r-5"></i>Xóa--}}
                        {{--</button>--}}
                        {{--@endif--}}
                        {{--<table id="grid" class="table-bordered "--}}
                        {{--data-toggle="table"--}}
                        {{--data-toolbar="#grid-btn-delete-multi"--}}
                        {{--data-search="true"--}}
                        {{--data-show-refresh="false"--}}
                        {{--data-show-toggle="false"--}}
                        {{--data-show-columns="false"--}}
                        {{--data-show-pagination-switch="false"--}}
                        {{--data-page-size="10"--}}
                        {{--data-page-list="[5, 10, 20, 30, 50]"--}}
                        {{--data-url="{{ action('Api\RoleController@grid') }}"--}}
                        {{--data-side-pagination="server"--}}
                        {{--data-pagination="true"--}}
                        {{--data-show-footer="false"--}}
                        {{--data-only-info-pagination="false"--}}
                        {{--data-locale="vi-VN"--}}
                        {{--data-pagination-pre-text="<< Trước"--}}
                        {{--data-pagination-next-text="Sau >>">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                        {{--<th data-field="state" data-checkbox="true"></th>--}}
                        {{--<th data-field="id" data-sortable="false">ID</th>--}}
                        {{--<th data-field="name" data-sortable="false">Tên role</th>--}}
                        {{--<th data-field="created_at" data-sortable="false" data-formatter="dateFormatter">Ngày tạo</th>--}}
                        {{--<th data-field="updated_at" data-sortable="false" data-formatter="dateFormatter">Ngày--}}
                        {{--cập nhật--}}
                        {{--</th>--}}
                        {{--<th data-field="id" data-align="center" data-formatter="gridAction">Hành động</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--</table>--}}
                    </div>
                </div>

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

    <script src="{{ asset("backend/plugins/jstree/jstree.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-table/js/bootstrap-table.js") }}"></script>

    <script src="{{ asset("backend/assets/pages/jquery.bs-table.js") }}"></script>
    <script src="{{ asset("backend/assets/pages/jquery.tree.js") }}"></script>

    <script src="{{ asset("backend/assets/js/jquery.core.js")}}"></script>
    <script src="{{ asset("backend/assets/js/jquery.app.js")}}"></script>

    @include('backend.shared.initjs')

    <script type="text/javascript">
        $(document).ready(function () {

            var $table = $('#grid');

            $table.on('page-change.bs.table', function (e, number, size, search) {
                var offset = (number - 1) * size;
                $table.bootstrapTable('refresh', {
                    offset: offset,
                    limit: size,
                    search: search
                });
            });

            {{--@if ((!Auth::user()->can('add-role') and !Auth::user()->can('edit-role')))--}}
            {{--$('.col-form').remove();--}}
            {{--$('.col-grid').removeClass('col-lg-8').addClass('col-lg-12');--}}
            {{--@endif--}}

            {{--@if (Auth::user()->can('add-role') and $role->id <= 0)--}}
            {{--$('.form-add').removeClass('d-none');--}}
            {{--$('.form-edit').remove();--}}
            {{--@endif--}}

            {{--@if (Auth::user()->can('edit-role') and $role->id > 0)--}}
            {{--$('.form-add').remove();--}}
            {{--$('.form-edit').removeClass('d-none');--}}
            {{--@endif--}}


            $('form').parsley();

            $('#name').slugify({target: '#slug'});

            $('.grid-btn-delete').on('click', function () {
                $('.form-delete').attr('action', $(this).attr('data-href'));
            });




            var permission_list = [];
            $("#checkTree").bind("select_node.jstree", function (evt, data) {
                permission_list = [];
                getPermissionList(evt, data);
            });

            $("#checkTree").on("deselect_node.jstree", function (evt, data) {
                console.log('unbind');
                permission_list = [];
                getPermissionList(evt, data);
            });

            var getPermissionList = function (evt, data) {
                var selected = $('#checkTree').jstree("get_selected");
                var selected_parent = data.instance.get_node().id;
               // console.log(selected_parent);
                var selected_arr = (selected + '').split(",");
                $.each(selected_arr, function (key, value) {
                    if (permission_list.indexOf(value) < 0) {
                        permission_list.push(value);
                        if (permission_list.indexOf(selected_parent) < 0) {
                            permission_list.push(selected_parent);
                        }
                    }
                });
                console.log(permission_list.toString());
                $('.js-list-permission').val(permission_list.toString());
            };


            // Hien thi tree sau khi them xong
            @if(Session::get('jstreePermission') != null)

            <?php foreach(Session::get('jstreePermission') as $node): ?>
                $('.jstree').jstree(true).select_node('<?=$node?>');
            <?php endforeach ?>

            @endif

        });

        function gridAction(value, row) {
            var actions = '';
            @if(Auth::user()->can('edit-role'))
                actions += '<a href="{{ action('Backend\RoleController@showEditForm', array('id'=>'')) }}/' + row.id + '" class="on-default edit-row text-primary"><i class="fa fa-pencil"></i></a> ';
            @endif
                    @if(Auth::user()->can('delete-role'))
                actions += '<a href="javascript:;" class="on-default remove-row text-danger grid-btn-delete" data-id="' + row.id + '" data-toggle="modal" data-target=".modal-delete"><i data-id="' + row.id + '" class="fa fa-trash-o grid-btn-delete"></i></a> ';
            @endif
                return actions;
        }
    </script>
@endsection
