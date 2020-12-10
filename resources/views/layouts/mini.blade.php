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
    <link href="{{ asset('mini/css/chosen/chosen.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @yield('topscripts')

</head>


<body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('layouts.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.sidebar')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row mb-0">
                        <div class="col-12 m-0">
                            @include('layouts.breadcrumbs')
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="card mt-0">

                        @if (session('status') != NULL)

                            <div class="card-header">
                                @php
                                $status = session('status')
                                @endphp

                                <div class="alert alert-{{$status['type']}}" role="alert">
                                    {{$status['message']}}
                                </div>
                            </div>
                            @php
                                Session::forget('status');
                            @endphp

                        @endif

                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('mini/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('mini/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('mini/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('mini/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('mini/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('mini/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('mini/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('mini/js/chosen/chosen.jquery.min.js') }}"></script>

    <script src="{{ asset('mini/js/bootstrap-filestyle.js') }}"></script>
    <script src="{{ asset('mini/js/app.js') }}"></script>
    @yield('bottomscripts')
</body>

</html>
