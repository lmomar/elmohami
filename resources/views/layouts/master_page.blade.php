<!DOCTYPE html>
<html dir="rtl" class="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keyword" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <title>Law office management</title>

        
        <!-- Icons -->
        <link href="{{ asset('css/app_tabs.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.tabs.min.css') }}" rel="stylesheet">
        <link href="{{ asset('style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
        <!-- Main styles for this application -->

    </head>

    <body class="navbar-fixed sidebar-nav fixed-nav en">
        <header class="navbar">
            <div class="container-fluid">
                <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
                <a class="navbar-brand" href="/">إدارة مكتب المحاماة</a>
                <ul class="nav navbar-nav hidden-md-down">
                    <li class="nav-item">
                        <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                    </li>

                    <!--<li class="nav-item p-x-1">
                        <a class="nav-link" href="#">داشبورد</a>
                    </li>
                    <li class="nav-item p-x-1">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                    <li class="nav-item p-x-1">
                        <a class="nav-link" href="#">Settings</a>
                    </li>-->
                </ul>
                <ul class="nav navbar-nav pull-left hidden-md-down">
                    <li class="nav-item">
                        <a class="nav-link aside-toggle" href="#"><i class="icon-bell"></i><span class="tag tag-pill tag-danger">5</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-list"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="hidden-md-down">مدیر</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header text-xs-center">
                                <strong>تنظیمات</strong>
                            </div>
                            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> پروفایل</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> تنظیمات</a>
                            <!--<a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="tag tag-default">42</span></a>-->
                            <div class="divider"></div>
                            <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> خروج</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-toggler aside-toggle" href="#">&#9776;</a>
                    </li>

                </ul>
            </div>
        </header>
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">
                        لوحة التحكم
                    </li>
                    <li class="nav-item">
                        @if(Auth::guard('office')->check())
                        <a class="nav-link" href="{{ route('users') }}"><i class="icon-people"></i>ادارة الحسابات</a>
                        @endif
                        <a class="nav-link" href="{{ route('files') }}"><i class="icon-docs"></i>إدارة الـمـلـفـات</a>
                        <a class="nav-link" href="{{ route('sittings')}}" id="getSittings"><i class="icon-calendar"></i>إدارة الجلسات</a>
                        <a class="nav-link" href="{{ route('courts') }}"><i class="icon-graduation"></i>إدارة المحاكم</a>
                        <a class="nav-link" href="#"><i class="icon-people"></i>إدارة الحسابات</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            <i class="fa fa-lock"></i> الخروج
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                    
                </ul>
            </nav>
        </div>
        <main class="main en">

            @yield('content')
        </main>

        <footer class="footer">
            <span class="text-left">
                إدارة مكتب المحاماة
            </span>
            <span class="pull-right">
                Powered by <a href="#"></a>
            </span>
        </footer>
        <!-- Bootstrap and necessary plugins -->
        <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
        <script src="{{ asset('js/libs/tether.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        @yield('script')

    </body>

</html>
