@extends('layouts.mini',[
'activePage' => 'change-incharge-officer',
'titlePage' => __('Tukar Pegawai Bertanggungjawab'),
])

@section('topscripts')
<link href="mini/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="mini/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="mini/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="mini/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="mini/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<style>
    .bg-darkblue {
        background-color: rgba(78, 127, 173, 0.5);
    }

    .bg-lightred {
        background-color: rgba(150, 30, 0, 0.5);
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
@endsection

@section('content')
@php
use App\Http\Controllers\SysSettingController as Sys;
use Carbon\Carbon;
@endphp
<form method="POST" action="{{url('pertukaran-pegawai-bertanggungjawab')}}">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-3">
                <span><label for="sender"> Nama Pemegang Baru :</label></span>
            </div>
            <div class="col">
                <select class="form-control select2" id="sender" name="sender" required>
                    @if (!empty($sender))
                    <option selected="selected" value="{{$sender}}">
                        {{App\Http\Controllers\ProfileController::name($sender)}}</option>
                    @else
                    <option value=""></option>
                    @endif
                    @foreach ($staff as $key=>$sender)
                    @if ($sender != auth()->user()->name)
                    <option value={{$key}}>{{$sender}}</option>
                    @endif

                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-2">
                <span><label for="catatan"> Catatan :</label></span>
            </div>
            <div class="col-10">
                <textarea id="catatan" name="catatan" class="form-control" maxlength="225" rows="3"
                    required>{{$catatan ?? ''}}</textarea>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            @if (count($files)!=0)
            <div class="table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr class="table-primary">
                            <th>#</th>
                            <th>No Fail</th>
                            <th>Tarikh Pinjam</th>
                            <th>Tarikh Pulang</th>
                            <th>Catatan</th>
                            <th>Pindah Fail</th>
                        </tr>
                    </thead>


                    <tbody>

                        @foreach ($files as $key=>$file)
                        <tr class="{{Sys::classDateCompare($file->res_return_date)}}">
                            <td>{{$key+1}}</td>
                            <td>{{$file->file_number}}</td>
                            <td>{{Sys::viewableDate($file->res_collect_date)}}</td>
                            <td>{{Sys::viewableDate($file->res_return_date)}}</td>
                            <td>{{$file->file_notes}}</td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="pindah" id="{{$file->file_number}}"
                                        data-Id="{{$file->id}}" data-fileId="{{$file->file_number}}"
                                        name="{{$file->file_number}}">
                                    <span class="slider"></span>
                                </label>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                <input class="form-control" type="hidden" name="files" id="files">
                <div class="form-group">
                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </div>
            </div>
            @else
            <h3><strong>Tiada Pinjaman Fail</strong></h3>
            <div class="form-group">
                <div class="row">
                    <button type="submit" disabled class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
            @endif
        </div>
    </div>
</form>
@endsection

@section('bottomscripts')
<script src="mini/libs/select2/js/select2.min.js"></script>
<script src="mini/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="mini/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
{{-- <script src="mini/js/pages/form-advanced.init.js"></script> --}}
<!-- Required datatable js -->
<script src="mini/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="mini/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="mini/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="mini/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="mini/libs/jszip/jszip.min.js"></script>
<script src="mini/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="mini/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="mini/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="mini/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="mini/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="mini/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="mini/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="mini/js/pages/datatables.init.js"></script>
<script>
    Array.prototype.remove = function() {
                    var what, a = arguments, L = a.length, ax;
                    while (L && this.length) {
                        what = a[--L];
                        while ((ax = this.indexOf(what)) !== -1) {
                            this.splice(ax, 1);
                        }
                    }
                    return this;
                };

                var fileList = [];
                $(document).ready(function(){
                    $(".pindah").click(function(){
                        if (document.getElementById($(this).attr("data-fileId")).checked == true)
                        {
                            fileList.push( $(this).attr("data-fileId") );
                        }
                        else
                        {
                            fileList.remove($(this).attr("data-fileId"));
                        }
                        document.getElementById('files').value = fileList;
                    });
                });
</script>
@endsection
