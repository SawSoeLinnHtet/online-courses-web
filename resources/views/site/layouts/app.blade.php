<!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Edubin - LMS Education HTML Template</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('site/images/favicon.png') }}" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/slick.css') }}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/animate.css') }}">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/nice-select.css') }}">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/jquery.nice-number.min.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/magnific-popup.css') }}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/font-awesome.min.css') }}">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/default.css') }}">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
  
  
</head>

<body>
    @include('site.layouts.preloader')
    
    @include('site.layouts.header')
    
    @include('site.layouts.search-box')

    @yield('content')
   
    <!--====== FOOTER PART START ======-->
    
    @include('site.layouts.footer')
    
    <!--====== jquery js ======-->
    <script src="{{ asset('site/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('site/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
    
    <!--====== Slick js ======-->
    <script src="{{ asset('site/js/slick.min.js') }}"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('site/js/jquery.magnific-popup.min.js') }}"></script>
    
    <!--====== Counter Up js ======-->
    <script src="{{ asset('site/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('site/js/jquery.counterup.min.js') }}"></script>
    
    <!--====== Nice Select js ======-->
    <script src="{{ asset('site/js/jquery.nice-select.min.js') }}"></script>
    
    <!--====== Nice Number js ======-->
    <script src="{{ asset('site/js/jquery.nice-number.min.js') }}"></script>
    
    <!--====== Count Down js ======-->
    <script src="{{ asset('site/js/jquery.countdown.min.js') }}"></script>
    
    <!--====== Validator js ======-->
    <script src="{{ asset('site/js/validator.min.js') }}"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="{{ asset('site/js/ajax-contact.js') }}"></script>
    
    <!--====== Main js ======-->
    <script src="{{ asset('site/js/main.js') }}"></script>
    
    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="{{ asset('site/js/map-script.js') }}"></script>

</body>
</html>
