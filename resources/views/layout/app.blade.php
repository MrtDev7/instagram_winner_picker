<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description"
          content="{{$config->description ?? 'none'}}"/>
    <meta name="keywords"
          content="{{$config->keywords ?? ''}}"/>
    <meta name="author" content="{{$config->name ??  'untitled'}}"/>

    <meta name="user_id" content="1">

    <title>{{ $config->name ?? 'untitled' }}</title>


    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon"/>
    <!-- Bootstrap 4.5 -->

    @if (LaravelLocalization::getCurrentLocaleDirection() === 'rtl')
        <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}" type="text/css"/>
    @else
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css"/>
    @endif
<!-- animate -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css"/>
    <!-- Swiper -->
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}"/>
    <!-- icons -->
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}" type="text/css"/>
    <!-- aos -->
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" type="text/css"/>
    <!-- main css -->
    @if (LaravelLocalization::getCurrentLocaleDirection() === 'rtl')
        <link rel="stylesheet" href="{{ asset('css/main-rtl.css') }}" type="text/css"/>
    @else
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css"/>
@endif
<!-- normalize -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" type="text/css"/>

</head>

<body>

<div id="wrapper">

    @include('layout.includes.header')


    <div id="content">


        @yield('content')


        @include('layout.includes.footer')

    </div>


    <!-- Back to top with progress indicator-->
    <div class="prgoress_indicator">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </div>

    <!-- Toasts -->
    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
        <div class="toast toast_demo" id="myTost" role="alert" aria-live="assertive" aria-atomic="true"
             data-animation="true" data-autohide="false">
            <div class="toast-body">
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <i class="tio clear"></i>
                </button>
                <h5> {{__('main.welcome_title')}} 👋</h5>
                <p>{{__('main.welcome_message')}} <span class="color-blue"> {{  $config->name  }} </span></p>
            </div>
        </div>
    </div>
    <!-- End. Toasts -->

    <!-- Start Section Loader -->
    <section class="loading_overlay">
        <div class="loader_logo">
            <img alt="logo" class="logo" src="{{ asset('img/logo.svg') }}"/>
        </div>
    </section>
    <!-- End. Loader -->


    <!-- Start Section Loader -->
    <section class="loading_overlay">
        <div class="loader_winner">
            <img alt="logo" class="logo" src="{{ asset('img/logo.svg') }}"/>
        </div>
    </section>
    <!-- End. Loader -->


    <!-- Login Modal  -->
@include('layout.auth.login')

<!-- End. Modal -->


    <!-- Registration model -->
@include('layout.auth.registration')
<!-- end model -->
</div>
<!-- End. wrapper -->

<!-- jquery -->
<script src="{{ asset('js/jquery-3.5.0.js') }}" type="text/javascript"></script>
<!-- jquery-migrate -->
<script src="{{ asset('js/jquery-migrate.min.js') }}" type="text/javascript"></script>
<!-- popper -->
<script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
<!-- bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<!--
============
vendor file
============
-->
<!-- particles -->
<script src="{{ asset('js/vendor/particles.min.js') }}" type="text/javascript"></script>
<!-- TweenMax -->
<script src="{{ asset('js/vendor/TweenMax.min.js') }}" type="text/javascript"></script>
<!-- ScrollMagic -->
<script src="{{ asset('js/vendor/ScrollMagic.js') }}" type="text/javascript"></script>
<!-- animation.gsap -->
<script src="{{ asset('js/vendor/animation.gsap.js') }}" type="text/javascript"></script>
<!-- addIndicators -->
<script src="{{ asset('js/vendor/debug.addIndicators.min.js') }}" type="text/javascript"></script>
<!-- Swiper js -->
<script src="{{ asset('js/vendor/swiper.min.js') }}" type="text/javascript"></script>
<!-- countdown -->
<script src="{{ asset('js/vendor/countdown.js') }}" type="text/javascript"></script>
<!-- simpleParallax -->
<script src="{{ asset('js/vendor/simpleParallax.min.js') }}" type="text/javascript"></script>
<!-- waypoints -->
<script src="{{ asset('js/vendor/waypoints.min.js') }}" type="text/javascript"></script>
<!-- counterup -->
<script src="{{ asset('js/vendor/jquery.counterup.min.js') }}" type="text/javascript"></script>
<!-- charming -->
<script src="{{ asset('js/vendor/charming.min.js') }}" type="text/javascript"></script>
<!-- imagesloaded -->
<script src="{{ asset('js/vendor/imagesloaded.pkgd.min.js') }}" type="text/javascript"></script>
<!-- BX-Slider -->
<script src="{{ asset('js/vendor/jquery.bxslider.min.js') }}" type="text/javascript"></script>
<!-- Sharer -->
<script src="{{ asset('js/vendor/sharer.js') }}" type="text/javascript"></script>
<!-- sticky -->
<script src="{{ asset('js/vendor/sticky.min.js') }}" type="text/javascript"></script>
<!-- Aos -->
<script src="{{ asset('js/vendor/aos.js') }}" type="text/javascript"></script>
<!-- main file -->
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>


</body>

</html>
