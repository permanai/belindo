<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | belindo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    {{-- <link rel="icon" type="image/png" href="images/icons/favicon.ico" />  --}}
    <link rel="icon" type="image/png" href="img/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/template/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/template/auth/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/auth/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/template/auth/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/template/auth/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/auth/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/template/auth/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/auth/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    {{-- <div class="limiter">
        <div class="container-login100"
            style="background-image: url('{{ asset('img/logo belindo.png') }}');">
            <div class="wrap-login100">
                @yield('content')
            </div>
        </div>
    </div> --}}

    <div class="limiter">
        <div class="container-login100"
            style="background-image: url('{{ asset('img/bglogin.png') }}'); background-size: 100%; background-repeat: no-repeat; background-position: center center;">
            <div class="wrap-login100">
                @yield('content')
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('/template/auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('/template/auth/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/js/main.js') }}"></script>

</body>

</html>
