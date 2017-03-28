<!DOCTYPE html>
<html  dir="rtl">

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

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('template/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{ asset('template/style.css') }}" rel="stylesheet">
    
</head>
<!-- BODY options, add following classes to body to change options
		1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
		2. 'sidebar-nav'		  - Navigation on the left
			2.1. 'sidebar-off-canvas'	- Off-Canvas
				2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
				2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
		3. 'fixed-nav'			  - Fixed navigation
		4. 'navbar-fixed'		  - Fixed navbar
	-->

<body class="navbar-fixed sidebar-nav fixed-nav">
<header class="navbar">

    <div class="container-fluid">

        <ul class="nav navbar-nav pull-left hidden-md-down">
            <div class="collapse navbar-collapse en" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar -->

                <ul class="nav navbar-nav">
                    <!-- Authentication Links -->

                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-lock"></i> الخروج
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                     
                </ul>
            </div>
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
                <a class="nav-link" href="#"><i class="icon-calendar"></i>إدارة الجلسات</a>
                <a class="nav-link" href="{{ route('courts') }}"><i class="icon-graduation"></i>إدارة المحاكم</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> الخروج
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

            <li class="nav-title">
                مدیریت فایل ها
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-people"></i> کاربران</a>
                <a class="nav-link" href="#"><i class="icon-docs"></i> فایل ها</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> ثبت کاربر جدید</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="components-buttons.html"><i class="icon-puzzle"></i> لیست کاربران</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-social-buttons.html"><i class="icon-puzzle"></i> Social
                            Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-cards.html"><i class="icon-puzzle"></i> Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-forms.html"><i class="icon-puzzle"></i> Forms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-switches.html"><i class="icon-puzzle"></i> Switches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="components-tables.html"><i class="icon-puzzle"></i> Tables</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Icons</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="icons-font-awesome.html"><i class="icon-star"></i> Font Awesome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="icons-simple-line-icons.html"><i class="icon-star"></i> Simple Line
                            Icons</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Widgets <span
                            class="tag tag-info">NEW</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="charts.html"><i class="icon-pie-chart"></i> Charts</a>
            </li>
            <li class="divider"></li>
            <li class="nav-title">
                Extras
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-404.html" target="_top"><i class="icon-star"></i> Error 404</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-500.html" target="_top"><i class="icon-star"></i> Error 500</a>
                    </li>
                </ul>
            </li>
            -->

        </ul>
    </nav>
</div>
<main class="main">

    @yield('content')
</main>

<footer class="footer">
        <span class="text-left">
            <a href="http://coreui.io">CoreUI</a> &copy; 2016 creativeLabs.
        </span>
        <span class="pull-right">
            Powered by <a href="http://coreui.io">CoreUI</a>
        </span>
</footer>
<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('template/js/libs/jquery.min.js') }}"></script>
<script src="{{ asset('template/js/libs/tether.min.js') }}"></script>
<script src="{{ asset('template/js/libs/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/js/libs/pace.min.js') }}"></script>

<!-- Plugins and scripts required by all views -->
{{--<script src="js/libs/Chart.min.js') }}"></script>--}}

<!-- CoreUI main scripts -->

<script src="{{ asset('template/js/app.js') }}"></script>

<!-- Plugins and scripts required by this views -->
<!-- Custom scripts required by this view -->
<script src="{{ asset('template/js/views/main.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
@yield('script')

</body>

</html>
