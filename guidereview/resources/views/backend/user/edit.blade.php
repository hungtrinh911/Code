@extends('backend.layout')
@section('title', ' user')
@section('css')
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

                <h4 class="page-title">Sửa user</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\UserController@index') }}">Users</a></li>
                    <li class="breadcrumb-item active">Sửa user</li>
                </ol>

            </div>
        </div>
        <form method="post" class="form-add"
              action="{{ action('Backend\UserController@edit', array('id'=>$user->id)) }}">
            {{csrf_field()}}
            <div class="row">

                <div class="col-lg-4 col-form">
                    <div class="card-box">
                        <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                        <div class="form-group">
                            @include('backend.shared.flash-message')
                        </div>

                        <div class="form-group">
                            <label for="name">Username<span class="text-danger">*</span></label>
                            <input type="text" id="username" name="username" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ $user->username }}">
                        </div>

                        <div class="form-group">
                            <label for="slug">Email<span class="text-danger">*</span></label>
                            <input type="text" id="email" name="email" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Sửa</button>
                        </div>

                        <input type="hidden" value="" name="list-roles" class="js-list-permission"/>

                    </div> <!-- end card-box -->


                </div>
                <!-- end col -->

                <div class="col-lg-8 col-grid">
                    <div class="card-box">
                        {{--role-list--}}
                        <h4 class="m-t-0 header-title">Danh sách roles</h4>
                        <hr>

                        <div id="checkTree"
                             class="jstree jstree-1 jstree-default jstree-checkbox-selection jstree-closed"
                             role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_1"
                             aria-busy="false">
                            <ul class="jstree-container-ul jstree-children" role="group">

                                @foreach (\App\Role::getAllApi(Auth::user()) as $item)

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
                                    </li>

                                @endforeach
                            </ul>
                        </div>
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

            $('form').parsley();

            //$('#name').slugify({target: '#slug'});

            $('.grid-btn-delete').on('click', function () {
                $('.form-delete').attr('action', $(this).attr('data-href'));
            });

            var role_list = [];
            $("#checkTree").bind("select_node.jstree", function (evt, data) {
                role_list = [];
                getPermissionList(evt, data);
            });

            $("#checkTree").on("deselect_node.jstree", function (evt, data) {
                console.log('unbind');
                role_list = [];
                getPermissionList(evt, data);
            });

            var getPermissionList = function (evt, data) {
                var selected = $('#checkTree').jstree("get_selected");
                var selected_arr = (selected + '').split(",");
                $.each(selected_arr, function (key, value) {
                    if (role_list.indexOf(value) < 0) {
                        role_list.push(value);
                    }
                });
                console.log(role_list.toString());
                $('.js-list-permission').val(role_list.toString());
            };

        });

        $("#checkTree")
            .bind("loaded.jstree", function (event, data) {
                @foreach($jsRoles as $node)
                $('#checkTree').jstree('select_node', {{$node}});
                @endforeach
            });


    </script>
@endsection
