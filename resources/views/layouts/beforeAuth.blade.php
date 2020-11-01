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

    {{--    form assets--}}
    <link rel="stylesheet" type="text/css" href="form-assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form-assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form-assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form-assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form-assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form-assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form-assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="form-assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="form-assets/css/main.css">
    {{--   end form assets--}}
</head>
<body>
<div id="app">
    <main class="">
        @yield('content')
    </main>
</div>

{{--SCRIPTS--}}

<script src="{{ asset('js/app.js') }}"></script>
{{--FORM SCRIPTS--}}
<script src="form-assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="form-assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="form-assets/vendor/bootstrap/js/popper.js"></script>
<script src="form-assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="form-assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="form-assets/vendor/daterangepicker/moment.min.js"></script>
<script src="form-assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="form-assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="form-assets/js/main.js"></script>
{{--END FORM SCRIPTS--}}
</body>
</html>

