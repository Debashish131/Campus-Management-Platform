<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Campus Management Platform - Login</title>
    <meta name="description" content="Campus Management Platform">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--    <!-- Google Fonts -->--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>--}}
{{--    <script>--}}
{{--        WebFont.load({--}}
{{--            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},--}}
{{--            active: function() {--}}
{{--                sessionStorage.fonts = true;--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
<!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
    <link rel="stylesheet" href="assets/css/animate/animate.min.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="bg-white">
<!-- Begin Preloader -->
{{--<div id="preloader">--}}
{{--    <div class="canvas">--}}
{{--        <img src="assets/img/logo.png" alt="logo" class="loader-logo">--}}
{{--        <div class="spinner"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- End Preloader -->
<!-- Begin Container -->
<div class="container-fluid no-padding h-100">
    <div class="row flex-row h-100 bg-white">
        <!-- Begin Left Content -->
        <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 col-12 no-padding">
            <div class="elisyam-bg background-03">
                <div class="elisyam-overlay overlay-08"></div>
                <div class="authentication-col-content-2 mx-auto text-center">
                    <div class="logo-centered">
                        <a href="/home">
                            <img src="assets/img/logo.png" alt="logo">
                        </a>
                    </div>
                    <h1>Join Our Community</h1>
                    <span class="description">
                               Campus Management Platform is a collaborate a huge ammount of student with our campus.Feel free to join our community and make a beautiful campus.!
                            </span>
                    <ul class="login-nav nav nav-tabs mt-5 justify-content-center" role="tablist" id="animate-tab">
                        <li><a class="active" data-toggle="tab" href="#singin" role="tab" id="singin-tab"
                               data-easein="zoomInUp">Sign In</a></li>
                        <li><a data-toggle="tab" href="#signup" role="tab" id="signup-tab" data-easein="zoomInRight">Sign
                                Up</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Left Content -->
        <!-- Begin Right Content -->
        <div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 col-12 my-auto no-padding">
            <!-- Begin Form -->
            <div class="authentication-form-2 mx-auto">
                <div class="tab-content" id="animate-tab-content">
                    <!-- Begin Sign In -->
                    <div role="tabpanel" class="tab-pane show active" id="singin" aria-labelledby="singin-tab">
                        <h3>Sign In To Campus Management Platform</h3>
                        {{--                        <form>--}}
                        {{--                            <div class="group material-input">--}}
                        {{--                                <input type="text" required>--}}
                        {{--                                <span class="highlight"></span>--}}
                        {{--                                <span class="bar"></span>--}}
                        {{--                                <label>Email</label>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="group material-input">--}}
                        {{--                                <input type="password" required>--}}
                        {{--                                <span class="highlight"></span>--}}
                        {{--                                <span class="bar"></span>--}}
                        {{--                                <label>Password</label>--}}
                        {{--                            </div>--}}
                        {{--                        </form>--}}
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="group material-input">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="group material-input">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="group material-input">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="group material-input">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Password</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col text-left">
                                    <div class="styled-checkbox">
                                        <input type="checkbox" name="checkbox" id="remeber">
                                        <label for="remeber">Remember me</label>
                                    </div>
                                </div>

                                <div class="col text-right">
                                    @if (Route::has('password.request'))
                                        <div class="col text-right">
                                            <a href="{{ route('password.request') }}">  {{ __('Forgot Your Password?') }}
                                                ?</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="sign-btn text-center">

                                <button type="submit" class="btn btn-lg btn-gradient-01">
                                    {{ __('Login') }}
                                </button>
                            </div>


                        </form>


                    </div>
                    <!-- End Sign In -->
                    <!-- Begin Sign Up -->
                    <div role="tabpanel" class="tab-pane" id="signup" aria-labelledby="signup-tab">
                        <h3>Create An Account</h3>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="group material-input">
                                <input type="text" class=" form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Name</label>
                            </div>
                            <div class="group material-input">
                                <input type="text" class=" form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" pattern=".+@diu.edu.bd"
                                       title="Please provide university e-mail address" required autocomplete="email">
{{--                                <input type="text" class=" form-control @error('email') is-invalid @enderror"--}}
{{--                                       name="email" value="{{ old('email') }}" required autocomplete="email">--}}
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

{{--                            <div class="group material-input">--}}
{{--                                <input type="file" class=" form-control @error('images') is-invalid @enderror" name="images"--}}
{{--                                       value="{{ old('images') }}" required autocomplete="images" autofocus>--}}
{{--                                <span class="highlight"></span>--}}
{{--                                <span class="bar"></span>--}}
{{--                                <label>Image</label>--}}
{{--                            </div>--}}

{{--                            <div class="group material-input">--}}
{{--                                <input type="text" class=" form-control @error('phone') is-invalid @enderror" name="phone"--}}
{{--                                       value="{{ old('phone') }}" required autocomplete="phone" autofocus>--}}
{{--                                <span class="highlight"></span>--}}
{{--                                <span class="bar"></span>--}}
{{--                                <label>Phone no</label>--}}
{{--                            </div>--}}

                            <div class="group material-input">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Password</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="group material-input">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Confirm Password</label>
                            </div>

                            <div class="row">
                                <div class="col text-left">
                                    <div class="styled-checkbox">
                                        <input type="checkbox" name="checkbox"  id="agree" class="form-control @error('checkbox') is-invalid @enderror" required>
                                        @error('checkbox')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <label for="agree">I Accept <a href="#">Terms and Conditions</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="sign-btn text-center">
                                <button type="submit" class="btn btn-lg btn-gradient-01">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                        <!-- End Sign Up -->
                    </div>
                </div>
                <!-- End Form -->
            </div>
            <!-- End Right Content -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Container -->
    <!-- Begin Vendor Js -->
    <script src="{{"assets"}}/vendors/js/base/jquery.min.js"></script>
    <script src="{{"assets"}}/vendors/js/base/core.min.js"></script>
    <!-- End Vendor Js -->
    <!-- Begin Page Vendor Js -->
    <script src="{{"assets"}}/vendors/js/app/app.min.js"></script>
    <!-- End Page Vendor Js -->
    <!-- Begin Page Snippets -->
    <script src="{{"assets"}}/js/components/tabs/animated-tabs.min.js"></script>
    <!-- End Page Snippets -->
</body>
</html>
