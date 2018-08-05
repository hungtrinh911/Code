<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset("backend/assets/images/favicon.ico") }}">
    <title>Đăng nhập | {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset("backend/assets/css/login/bootstrap.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("backend/assets/css/login/icons.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("backend/assets/css/login/style.css") }}"/>
    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
</head>
<body>
<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="card-box">
        <div class="panel-heading">
            <h4 class="text-center">Đăng nhập</h4>
        </div>

        <div class="p-20">
            <form method="POST" class="form-horizontal m-t-20" action="{{ action('Backend\AuthController@login') }}">
                <!-- @csrf -->
                {{ csrf_field() }}
                <input id="channel" type="hidden" name="channel" value="backend">
        
                @if ($errors->any())
                    <div class="form-group-custom alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="form-group-custom">
                    <input type="text" id="usernameOrEmail" name="usernameOrEmail" value="{{ old('usernameOrEmail') }}"
                           required="required"/>
                    <label class="control-label" for="usernameOrEmail">Tên đăng nhập/Email</label><i class="bar"></i>
                </div>

                <div class="form-group-custom">
                    <input type="password" id="password" name="password" required="required"/>
                    <label class="control-label" for="password">Mật khẩu</label><i class="bar"></i>
                </div>

                <div class="form-group ">
                    <div class="col-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" name="remember"
                                   type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                            <label for="checkbox-signup">
                                Tự động đăng nhập lần sau
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-12">
                        <button class="btn btn-success btn-block text-uppercase waves-effect waves-light"
                                type="submit">Đăng nhập
                        </button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-12">
                        <a href="{{ route('password.request') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i>
                            Quên mật khẩu?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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

<script src="{{ asset("backend/assets/js/jquery.core.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.app.js") }}"></script>
</body>
</html>