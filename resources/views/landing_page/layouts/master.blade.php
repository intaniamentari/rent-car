<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('landing_page/css/open-iconic-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing_page/css/animate.css') }}">

        <link rel="stylesheet" href="{{ asset('landing_page/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing_page/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing_page/css/magnific-popup.css') }}">

        <link rel="stylesheet" href="{{ asset('landing_page/css/aos.css') }}">

        <link rel="stylesheet" href="{{ asset('landing_page/css/ionicons.min.css') }}">

        <link rel="stylesheet" href="{{ asset('landing_page/css/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('landing_page/css/jquery.timepicker.css') }}">


        <link rel="stylesheet" href="{{ asset('landing_page/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('landing_page/css/icomoon.css') }}">
        <link rel="stylesheet" href="{{ asset('landing_page/css/style.css') }}">
    </head>
    <body>
        @include('landing_page.partials.navbar')

        @yield('content')

        @include('landing_page.partials.footer')

        <script src="{{ asset('landing_page/js/jquery.min.js') }}"></script>
        <script src="{{ asset('landing_page/js/jquery-migrate-3.0.1.min.js')}}""></script>
        <script src="{{ asset('landing_page/js/popper.min.js')}}"></script>
        <script src="{{ asset('landing_page/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('landing_page/js/jquery.easing.1.3.js')}}"></script>
        <script src="{{ asset('landing_page/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('landing_page/js/jquery.stellar.min.js')}}"></script>
        <script src="{{ asset('landing_page/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('landing_page/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('landing_page/js/aos.js')}}"></script>
        <script src="{{ asset('landing_page/js/jquery.animateNumber.min.js')}}"></script>
        <script src="{{ asset('landing_page/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{ asset('landing_page/js/jquery.timepicker.min.js')}}"></script>
        <script src="{{ asset('landing_page/js/scrollax.min.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="{{ asset('landing_page/js/google-map.js') }}"></script>
        <script src="{{ asset('landing_page/js/main.js') }}"></script>

        @stack('js')
    </body>
</html>
