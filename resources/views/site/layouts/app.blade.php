<!DOCTYPE html>
<html>

<head>
    <title> Photo Share | @yield('title') </title>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="RoQaY">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" Photo Share website">
    <meta name="keywords" content=" Photo Share ">
    <meta name="csrf-token" content="V2G8zLS7dL5HzdfwxaBDewvJvAKCyeThQE4NBtJv">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/sweetalert/sweetalert2.css') }}">

    @stack('css')

</head>

<body>
<div class="body_wrapper" id="app">
    {{--    <div class="preloader">--}}
    {{--        <div class="preloader-loading">--}}
    {{--            <img src="{{ asset('images/logo-m.png" data-src="{{ asset('images/logo-m.png" class="lazyload">--}}
    {{--        </div>--}}
    {{--    </div>--}}

    @include('site.layouts.nav')

    @yield('content')

    @include('site.layouts.footer')

    <span class="scroll-top"> <a href="#"><i class="fas fa-chevron-up"></i></a> </span>
</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/lazysizes.min.js') }}"></script>
<script src="{{ asset('js/fontawesome.min.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/sweetalert2.all.js') }}"></script>


@stack('js')

</body>

</html>
