<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8" />
    <title>{{config('app.name')}} - {{$titlePage ?? ''}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Document Handling for PTPK" name="description" />
    <meta content="angah" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('mini/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('mini/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('mini/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('mini/css/app-dark.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @yield('topscripts')
    <style>
        .footerx {
            bottom: 0;
            padding: 20px calc(20px / 2);
            position: absolute;
            right: 0;
            color: #898fa9;
            left: 2px;
            height: 60px;
            -webkit-box-shadow: 0 0px 4px rgba(15, 34, 58, 0.12);
                    box-shadow: 0 0px 4px rgba(15, 34, 58, 0.12);
        }
    </style>
</head>

<body class="authentication-bg">
        <div class="container">


                    @yield('content')



            <!-- end row -->
        </div>
        <!-- end container -->

    @include('layouts.blank-footer')
    <!-- JAVASCRIPT -->
    <script src="{{ asset('mini/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('mini/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('mini/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('mini/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('mini/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('mini/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('mini/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('mini/js/chosen/chosen.jquery.min.js') }}"></script>

    <!-- apexcharts -->


    <script src="{{ asset('mini/js/pages/dashboard.init.js') }}"></script>

    <script src="{{ asset('mini/js/bootstrap-filestyle.js') }}"></script>
    <script src="{{ asset('mini/js/app.js') }}"></script>

</body>

</html>
