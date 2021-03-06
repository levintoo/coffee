<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome-v5.15.4/all.min.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css') }}">
    <!-- Themify icon-->
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">--}}
<!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
    <!-- Plugins css Ends-->
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>
<section></section>
@yield('content')
<script src="{{ asset('js/font-awesome-6.1.1/all.min.js') }}"></script>
<!-- latest jquery-->
<script src="{{ asset('assets/js/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}'"></script>
<script src="{{ asset('assets/js/form-wizard/form-wizard-three.js') }}'"></script>
<script src="{{ asset('assets/js/form-wizard/jquery.backstretch.min.js') }}'"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<!-- Sidebar jquery-->
<script src="{{ asset('assets/js/config.js') }}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('assets/js/sweet-alert/sweetalert2.all.min.js') }}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('assets/js/script.js') }}"></script>
<!-- login js-->
<!-- Plugin used-->
@yield('scripts')
</body>
</html>
