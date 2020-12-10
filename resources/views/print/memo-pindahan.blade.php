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

        .brd {
            border-top: #000 solid 3px !important;
            border-bottom: #000 solid 3px !important;
            border-left: #000 solid 3px !important;
            border-right: #000 solid 3px !important;
            border-width: 3px !important;
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

            .brd {
                border-top: #000 solid 3px !important;
                border-bottom: #000 solid 3px !important;
                border-left: #000 solid 3px !important;
                border-right: #000 solid 3px !important;
                border-width: 3px !important;
                border-style: solid !important;
                border-color: black !important;
            }
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="book">
            <div class="page">
                <div class="row pb-3">
                    <div class="col-md-12 d-flex justify-content-center">
                        <img alt="Jata Negara" src="images/jata.png" width="120px" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-center font-weight-bold">
                            MEMO<br>
                            CAWANGAN DOKUMENTASI DAN REKOD<br>
                            PERBADANAN TABUNG PEMBANGUNAN KEMAHIRAN

                        </h5>
                    </div>
                </div>
                <div class="row pt-3">
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="brd font-weight-bold align-middle" style="width: 20%; height: 0px">
                                        Perkara</td>
                                    <td class="brd font-weight-bold" colspan="2" style="width: 80%">ARAHAN
                                        DAN JADUAL GILIRAN BERTUGAS BAHAGIAN PENGURUSAN MAKLUMAT SEMASA PERINTAH KAWALAN
                                        PERGERAKAN BERSYARAT (PKPB)</td>
                                </tr>
                                <tr>
                                    <td class="brd font-weight-bold" style="width: 20%; height: 0px">
                                        Kepada</td>
                                    <td class="brd" style="width: 50%">BAHAGIAN PENGURUSAN MAKLUMAT</td>
                                    <td class="brd" rowspan="2" style="width: 30%">
                                        <strong>Salinan :</strong> <br>
                                        PB(P) <br>
                                        PPK(PSM)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="brd font-weight-bold" style="width: 20%; height: 0px">
                                        Daripada</td>
                                    <td class="brd" style="width: 50%">PPK(PM)</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-justify">Dengan hormatnya saya merujuk kepada perkara diatas.</p>
                        <p class="text-justify">2. Sebagaimana yang tuan/puan sedia maklum, Perintah Kawalan Pergerakan
                            Bersyarat (PKPB) bagi negeri Selangor, Wilayah Persekutuan Kuala Lumpur dan Putrajaya telah
                            dikenakan bermula 14 Oktober hingga 27 Oktober 2020. Satu memo telah dikeluarkan pada 14
                            Oktober 2020 (Rujukan : PTPK.PM.100-1/1/Jld.4 (13)) bagi menyatakan mengenai arahan dan
                            jadual giliran bertugas sepanjang tempoh PKPB.</p>
                        <p class="text-justify">3. Bagaimanapun, satu email daripada Cawangan Pengurusan Sumber Manusia
                            (PSM) bertarikh 21/10/2020 telah menyatakan bahawa keberadaan pegawai di pejabat adalah pada
                            tahap maksimum 30 peratus sahaja. Sehubungan dengan itu, pihak tuan/puan diarahkan untuk
                            bertugas secara Bekerja Dari Rumah (BDR) sepanjang tempoh tersebut berdasarkan arahan yang
                            dikeluarkan dari masa ke semasa serta mengikuti setiap arahan pentadbiran yang dikeluarkan
                            oleh pihak Pengurusan PTPK.</p>
                        <p class="text-justify">4. Selain daripada itu, dilampirkan bersama adalah senarai tugasan /
                            aktiviti yang perlu dilaksanakan / diselesaikan sepanjang tempoh PKPB berlangsung samada
                            dilakukan semasa Penggiliran Hadir Bekerja / Bekerja di Rumah. Komitmen tuan dalam
                            melaksanakan tanggungjawab yang digariskan amat diharapkan dan mematuhi peraturan yang
                            berkuat kuasa.</p>
                        <p class="text-justify">Segala kerjasama yang diberikan oleh pihak tuan / puan adalah didahului
                            dengan ucapan ribuan terima kasih</p>
                        <p>Sekian, terima kasih.</p>
                        <p>“Pekerja Dan Cabaran Budaya Norma Baharu”</p>
                        <p>Memo ini tidak memerlukan tandatangan kerana dijana oleh sistem</p>
                        <p>-=-=-=</p>












                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="page">
        <div class="subpage">Page 2/2</div>
    </div>
    </div>


    </div>
</body>

<script>
    // window.print();
</script>
