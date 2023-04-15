<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - {{ config('app.name', 'Beautiful Campus') }}</title>
    <meta name="description" content="Beautiful Campus">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--toaster--}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    {{--    <!-- Google Fonts -->--}}
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>--}}
    {{--    <script>--}}
    {{--        WebFont.load({--}}
    {{--            google: {"families": ["Montserrat:400,500,600,700", "Noto+Sans:400,700"]},--}}
    {{--            active: function () {--}}
    {{--                sessionStorage.fonts = true;--}}
    {{--            }--}}
    {{--        });--}}
    {{--    </script>--}}
<!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{"assets"}}/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
{{--    <link rel="stylesheet" href="{{"assets"}}/vendors/css/base/elisyam-1.5-dark.min.css">--}}

</head>


@stack('css')


<body id="page-top">

<div class="page db-modern">
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <!-- Begin Search Box-->
                <div class="search-box">
                    <button class="dismiss"><i class="ion-close-round"></i></button>
                    <form id="searchForm" action="#" role="search">
                        <input type="search" placeholder="Search something ..." class="form-control">
                    </form>
                </div>
                <!-- End Search Box-->
                <!-- Begin Topbar -->
                <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                    <!-- Begin Logo -->
                    <div class="navbar-header">
                        <a href="/home" class="navbar-brand">
                            <div class="brand-image brand-big">
                                <img src="assets/img/logo-big.png" alt="logo" style="width: 150px;" class="logo-big">
                            </div>
                            <div class="brand-image brand-small">
                                <img src="assets/img/logo.png" alt="logo" class="logo-small">
                            </div>
                        </a>
                    </div>
                    <!-- End Logo -->
                    <!-- Begin Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                        <!-- Search -->
                        <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i
                                    class="la la-search"></i></a></li>
                        <!-- End Search -->
                        <!-- Begin Notifications -->
                    @yield('notification')
                    <!-- End Notifications -->
                        <!-- User -->
                        <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#"
                                                         data-toggle="dropdown" aria-haspopup="true"
                                                         aria-expanded="false" class="nav-link">
                                @if(Auth::user()->image)
                                    <img
                                        src="storage/user/{{Auth::user()->image}}" alt="..."
                                        class="avatar rounded-circle">
                                @endif
                            </a>
                            <ul aria-labelledby="user" class="user-size dropdown-menu">
                                <li class="welcome">
                                    <a href="/profile" class="edit-profil"><i class="la la-gear"></i></a>
                                    @if(Auth::user()->image)
                                        <img src="storage/user/{{Auth::user()->image}}" alt="..."
                                             class="rounded-circle">
                                    @endif
                                </li>
                                <li>
                                    <a href="/profile" class="dropdown-item">
                                        {{Auth::user()->name}} Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="app-mail.html" class="dropdown-item">
                                        Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item no-padding-bottom">
                                        Settings
                                    </a>
                                </li>
                                <li class="separator"></li>
                                <li>
                                    <a href="pages-faq.html" class="dropdown-item no-padding-top">
                                        Faq
                                    </a>
                                </li>
                                <li><a rel="nofollow" href="/userlogout"
                                       class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
                            </ul>
                        </li>
                        <!-- End User -->

                    </ul>
                    <!-- End Navbar Menu -->
                </div>
                <!-- End Topbar -->
            </nav>
        </div>
    </header>
    <div class="page-content">
        <!-- Begin Navigation -->
        <div class="horizontal-menu">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-light navbar-expand-lg main-menu">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li><a href="/home">Dashboard</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="applications" role="button"
                                       data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">Complain</a>
                                    <ul class="dropdown-menu" aria-labelledby="applications">
                                        <li><a href="/complainForm">Add Complain</a></li>
                                        <li><a href="complainView">View Complain</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="applications" role="button"
                                       data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">Suggestions</a>
                                    <ul class="dropdown-menu" aria-labelledby="applications">
                                        <li><a href="/suggestionForm">Add Suggestions</a></li>
                                        <li><a href="/suggestionView">View Suggestions</a></li>
                                    </ul>
                                </li>

                                <li><a href="/notice">Notice</a></li>
                                <li><a href="/chatify">Helpline</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navigation -->

        <div class="content-inner boxed mt-4 w-100">

        {{--            Begin main content--}}
        @yield('maincontent')

        {{--    End main content--}}
        <!-- End Container -->
            <!-- Begin Page Footer-->
            <footer class="main-footer">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                            <p class="text-gradient-02">Design By Heaven</p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Page Footer -->
            <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>

        </div>
        <!-- End Content -->
    </div>
</div>
<!-- Begin Vendor Js -->
<script src="assets/vendors/js/base/jquery.min.js"></script>
<script src="assets/vendors/js/base/core.min.js"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
{{--<script src="{{"assets"}}/vendors/js/chart/chart.min.js"></script>--}}
<script src="{{"assets"}}/vendors/js/progress/circle-progress.min.js"></script>
<script src="assets/vendors/js/app/app.min.js"></script>
<!-- End Page Vendor Js -->
<!-- Begin Page Snippets -->
<script src="assets/js/dashboard/db-modern-dark.min.js"></script>
<!-- End Page Snippets -->

{{--Toaster--}}
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@stack('js')
</body>
</html>
