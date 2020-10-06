<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') -{{ config('', 'software') }}</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/img/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/frontend/img/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/frontend/img/favicon.ico') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('assets/backend/plugins/node-waves/waves.css') }}" rel="stylesheet">
    <!-- Animation Css -->
    <link href="{{ asset('assets/backend/plugins/animate-css/animate.css') }}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('assets/backend/css/themes/all-themes.css') }}" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @stack('css')

</head>
<body class="theme-red">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
@include('layouts.backend.inc.header')
<section>
    @include('layouts.backend.inc.sidebar')
</section>

<section class="content">
    @yield('content')
</section>
<!-- Jquery Core Js -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('assets/backend/plugins/node-waves/waves.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('assets/backend/js/admin.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/index.js') }}"></script>

<!-- Demo Js -->
<script src="{{ asset('assets/backend/js/demo.js') }}"></script> <!-- Jquery Core Js -->

@stack('js')
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! \Brian2694\Toastr\Facades\Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>

</body>
</html>
