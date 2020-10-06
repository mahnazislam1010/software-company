<!DOCTYPE html>
<html lang="zxx">
<head>
    <title> @yield('title') -{{ config('', 'software') }}</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('assets/frontend/img/logos/logo-shortcut.png')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/font-awesome.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/switcher.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/styles.css')}}" id="colors">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    @stack('css')
</head>
<body>
<div id="preloader">
    <div class="row loader">
        <div class="loader-icon"></div>
    </div>
</div>
<div id="top-bar" class="hidden-sm-down">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="top-bar-welcome">
                    <ul>
                        <li>Welcome to {{isset(\App\Logo_name::first()->name)?\App\Logo_name::first()->name:'' }}</li>
                    </ul>
                </div>
                <div class="top-bar-info">
                    <ul>
                        <li><i class="fa fa-phone"></i>{{isset(\App\Contact_information::first()->phone)?\App\Contact_information::first()->phone:'' }}
                        <li>
                        <li><i class="fa fa-envelope"></i>{{isset(\App\Contact_information::first()->email)?\App\Contact_information::first()->email:'' }}
                        <li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <ul class="social-icons hidden-md-down">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('layouts.frontend.inc.header')


<section class="content">
    @yield('content')
</section>

@include('layouts.frontend.inc.footer')

    <a href="#" class="scroll-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

<script src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/owl.carousel.js')}}"></script>
<script src="{{asset('assets/frontend/js/navigation.js')}}"></script>
<script src="{{asset('assets/frontend/js/navigation.fixed.js')}}"></script>
<script src="{{asset('assets/frontend/js/wow.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/tabs.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.mb.YTPlayer.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/modernizr.js')}}"></script>
<script src="{{asset('assets/frontend/js/switcher.js')}}"></script>
<script src="{{asset('assets/frontend/js/map.js')}}"></script>
<script src="{{asset('assets/frontend/js/main.js')}}"></script>
@stack('js')
    </body>
</html>


