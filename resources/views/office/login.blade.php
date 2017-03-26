<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <title>CoreUI Bootstrap 4 Admin Template</title>
    <!-- Icons -->
    <!-- Icons -->
    <link href="{{ asset('template/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{ asset('template/style.css') }}" rel="stylesheet">

</head>

<body class="">
<div class="container">
    <div class="row">
        <div class="col-md-8 m-x-auto pull-xs-none vamiddle">
            <div class="card-group ">
                <div class="card p-a-2">
                    <div class="card-block">
                        <h1>تسجيل الدخول</h1>

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('office.login.submit') }}">
                            {{ csrf_field() }}
                            <div class="input-group m-b-1">

                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input id="user_name" type="text" placeholder="إسم المستعمل"
                                       class="form-control" name="user_name" value="{{ old('user_name') }}" required
                                       autofocus>
                                </i>
                                @if ($errors->has('user_name') || $errors->has('password'))
                                    <span class="help-block">
                                        <strong>اسم المستخدم أو كلمة المرور غير صحيحة</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group m-b-2">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input id="password" placeholder="كلمة المرور" type="password"
                                       class="form-control" name="password" required>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <button type="submit" class="btn btn-primary p-x-2">
                                        <i class="icon-login"></i>
                                        تسجيل الدخول
                                    </button>
                                </div>
                                <div class="col-xs-6 text-xs-right">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <button type="button" class="btn btn-link p-x-0">نسيت كلمة المرور؟</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card card-inverse card-primary p-y-3" style="width:44%">
                    <div class="card-block text-xs-center">
                        <div>
                            <h2>ثبت نام</h2>

                            <p>اگر در سامانه عضو نیستید به راحتی می توانید همین الان نام نویسی کنید.</p>
                            <button type="button" class="btn btn-primary active m-t-1">عضویت رایگان</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('template/js/libs/jquery.min.js') }}"></script>
<script src="{{ asset('template/js/libs/tether.min.js') }}"></script>
<script src="{{ asset('template/js/libs/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/js/libs/pace.min.js') }}"></script>


<script>
    function verticalAlignMiddle() {
        var bodyHeight = $(window).height();
        var formHeight = $('.vamiddle').height();
        var marginTop = (bodyHeight / 2) - (formHeight / 2);
        if (marginTop > 0) {
            $('.vamiddle').css('margin-top', marginTop);
        }
    }
    $(document).ready(function () {
        verticalAlignMiddle();
    });
    $(window).bind('resize', verticalAlignMiddle);
</script>
<!-- Grunt watch plugin -->

</body>

</html>
