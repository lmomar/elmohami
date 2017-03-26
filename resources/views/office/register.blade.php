<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html dir="rtl" lang="en">

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
        <div class="col-md-5 m-x-auto pull-xs-none vamiddle">
            <div class="card">
                <div class="card-block p-a-2">
                    <h1>إنشاء حساب المكتب</h1>

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('office.register') }}">
                        {{ csrf_field() }}
                        <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                            <input id="code" placeholder="رمز المكتب" type="text" class="form-control en" name="code"
                                   value="{{ old('code') }}" required autofocus>

                            @if ($errors->has('code'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                            <input id="user_name" placeholder="إسم المستعمل" type="text" class="form-control"
                                   name="user_name"
                                   value="{{ old('user_name') }}" required autofocus>

                            @if ($errors->has('user_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                         <div class="input-group m-b-1">
                            <span class="input-group-addon"><i>@</i>
                            </span>
                            <input id="email" placeholder="البريد الإلكتروني" type="text" class="form-control"
                                   name="email"
                                   value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-envelope-letter"></i>
                            </span>
                            <input id="address" placeholder="العنوان البريدي" type="text" class="form-control en"
                                   name="address"
                                   value="{{ old('address') }}" required autofocus>

                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-call-in"></i>
                            </span>
                            <input id="phone" placeholder="رقم الهاتف" type="phone" class="form-control en" name="phone"
                                   value="{{ old('phone') }}" required>

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input id="password" placeholder="كلمة المرور" type="password" class="form-control"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-group m-b-2">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input id="password-confirm" placeholder="تأكيد كلمة المرور" type="password"
                                   class="form-control" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-block btn-success">
                            <i class="icon-user-follow"></i>
                            إنشاء حساب
                        </button>
                    </form>
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