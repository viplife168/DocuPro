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

    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 2mm;
            margin: auto;
        }

        .subpage {
            padding: 1cm;
            height: 290mm;
        }

        .brd td {
            border-top: #000 solid 1px !important;
            border-bottom: #000 solid 1px !important;
            border-left: #000 solid 1px !important;
            border-right: #000 solid 1px !important;
            border-width: 1px !important;
            border-style: solid !important;
            border-color: black !important;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {

                margin-top: 15mm;
                margin-bottom: 25mm;
                margin-left: 30mm;
                margin-right: 30mm;
                width: initial;
                min-height: initial;
                page-break-after: always;
            }

            .brd td {
                border-top: #000 solid 1px !important;
                border-bottom: #000 solid 1px !important;
                border-left: #000 solid 1px !important;
                border-right: #000 solid 1px !important;
                border-width: 1px !important;
                border-style: solid !important;
                border-color: black !important;
            }
        }
    </style>

</head>

@php
$m=125;
$p=40;
$n=$m/$p;
@endphp

<body>
    <div class="container">
        <div class="book">
            @while ($n >0)
            <div class="page">
                {{-- <div class="row pb-3">
                    <div class="col-md-12 d-flex justify-content-center">
                        <img alt="Jata Negara" src="/images/jata.png" width="120px" />
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-center font-weight-bold">
                         SENARAI CARIAN FAIL
                        </h5>
                        <h6 class="text-center">{{now()}}</h6>
                    </div>
                </div>
                {{-- <div class="row pt-3">
                    <div class="col-md-12">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="text-left"><strong>Ruj. Kami : </strong> PTPK.PM.100-1/1 Jld.4 (14)</td>
                                    <td class="text-right"><strong>Tarikh : </strong>{{now()}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <table class="table brd">
                            <thead class="brd">
                                <tr class="brd">
                                    <td><strong>#</strong></td>
                                    <td><strong>No Fail</strong></td>
                                    <td><strong>Nama Peminjam</strong></td>
                                    <td><strong>Status</strong></td>
                                    <td><strong>Lokasi</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $q=40;
                                @endphp
                                @while ($q >0)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @php
                                    $q=$q-1;
                                    $p=$p-1;
                                    $m=$m-1;
                                @endphp
                                @endwhile
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @php
                $n=$n-1;
            @endphp
            @endwhile

        </div>

    </div>
</body>

<script>
    // window.print();
</script>
