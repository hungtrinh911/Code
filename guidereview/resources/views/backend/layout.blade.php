<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset("backend/assets/images/favicon.ico") }}">
    @yield('css')
</head>
<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="{{ Helper::currentRoutePrefix() }}" class="logo"><i class="icon-magnet icon-c-logo"></i><span>GUIDEREVIEW<i
                                class="md md-album"></i></span></a>

            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <nav class="navbar-custom">

            <ul class="list-inline float-right mb-0">
                <li class="list-inline-item dropdown notification-list d-none">
                    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown"
                       href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <i class="dripicons-bell noti-icon"></i>
                        <span class="badge badge-pink noti-icon-badge">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5><span class="badge badge-danger float-right">5</span>Notification</h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-success"><i class="icon-bubble"></i></div>
                            <p class="notify-details">Robert S. Taylor commented on Admin
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info"><i class="icon-user"></i></div>
                            <p class="notify-details">New user registered.
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-danger"><i class="icon-like"></i></div>
                            <p class="notify-details">Carlos Crouch liked <b>Admin</b>
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
                            View All
                        </a>

                    </div>
                </li>

                <li class="list-inline-item notification-list">
                    <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
                        <i class="dripicons-expand noti-icon"></i>
                    </a>
                </li>

                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                       href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        {{--<img src="{{ asset("backend/assets/images/users/avatar-1.jpg") }}" alt="user"--}}
                        {{--class="rounded-circle">--}}
                        <i class="dripicons-user noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="md md-account-circle"></i> <span>Tài khoản</span>
                        </a>

                        <!-- item-->
                        <a href="{{ action('Backend\AuthController@logout') }}" class="dropdown-item notify-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="md md-settings-power"></i> <span>Logout</span>
                            <form id="logout-form" action="{{ action('Backend\AuthController@logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </div>
                </li>
                <li class="list-inline-item dropdown notification-list">
                    <div class="select-lang">
                        <ul class="list-unstyled">
                            @foreach(\App\Helper::localeList() as $item)
                                @if(\App\Helper::currentLocale() !== $item->locale)
                                    <li class="active">
                                        <a href="?lang={{ $item->locale }}"><img src="{{ $item->flag }}"/></a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>
                <li class="hide-phone app-search d-none">
                    <form role="search" class="">
                        <input type="text" placeholder="tìm kiếm ..." class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>
                </li>
            </ul>

        </nav>

    </div>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>

                    @foreach (Auth::user()->menu() as $item)
                        <li @if($item->hasChild)class="has_sub"@endif>

                            <a href="{{ $item->hasChild ? 'javascript:void(0);' : Helper::currentRoutePrefix() . $item->menu_item_slug }}"
                               class="waves-effect">
                                <i class="{{ $item->featured_img }}"></i>
                                <span> {{ $item->title }} </span>
                                @if($item->hasChild)<span class="menu-arrow"></span>@endif
                            </a>
                            @if($item->hasChild)
                                <ul class="list-unstyled">
                                    @foreach ($item->children as $child)
                                        @if($child->showOnMenu)
                                            <li><a href="{{ $child->menu_item_slug }}">{{ $child->title }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            @yield('content')

        </div> <!-- content -->

    </div>
</div>
<!-- END wrapper -->
@yield('javascript')
</body>
</html>
