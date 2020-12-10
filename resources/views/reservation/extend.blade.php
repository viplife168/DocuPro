@extends('layouts.mini',[
'activePage' => 'extend',
'titlePage' => __('Lanjutan Pinjaman'),
])
@section('topscripts')
<link href="mini/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="mini/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="mini/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
@endsection

@section('content')
@php
use App\Http\Controllers\SysSettingController as Sys;
use Carbon\Carbon;
@endphp

<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr class="table-primary">
            <th>#</th>
            <th>No Fail</th>
            <th>Tarikh Pinjam</th>
            <th>Tarikh Pulang</th>
            <th>Catatan</th>
            <th>Tindakan</th>
        </tr>
    </thead>


    <tbody>
        @if (!empty($files))
        @foreach ($files as $key=>$file)
        <tr class="{{Sys::classDateCompare($file->res_return_date)}}">
            <td>{{$key+1}}</td>
            <td>{{$file->file_number}}</td>
            <td>{{Sys::viewableDate($file->res_collect_date)}}</td>
            <td>{{Sys::viewableDate($file->res_return_date)}}</td>
            <td>{{$file->file_notes}}</td>
            <td>
                @php
                $return = new Carbon($file->res_return_date);
                    $nexReturn = Sys::viewableDate($return->addDay(14));
                @endphp
                <a data-toggle="modal" data-next-return="{{$nexReturn}}" data-id="{{$file->id}}" data-return-date="{{Sys::viewableDate($file->res_return_date)}}"
                    data-collect-date="{{Sys::viewableDate($file->res_collect_date)}}" title="Add this item"
                    class="open-Lanjutan btn btn-primary" href="#modalLanjutan">Lanjut Pinjaman</a>
            </td>
        </tr>

        @endforeach
        @else
        <p>Tiada Pinjaman Fail</p>
        @endif
    </tbody>
</table>
<!-- center modal -->


<div class="modal hide" id="modalLanjutan">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="text-white">Lanjut Pinjaman</h3>
                <button class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <form  method="POST" action="{{url('lanjutan/hantar')}}">
                    @csrf
                    Tarikh Sepatut Pulang : <strong class="text-success" id="returnDate"></strong><br>
                    Tarikh Pulang Baru : <strong class="text-danger" id="nextReturn"></strong>
                    <br>
                    <input type="hidden" name="fileId" id="fileId" value="" />
                    <input type="hidden" name="collectDate" id="collectDate" value="" />
                    <input type="hidden" name="returnDate" id="returnDate" value="" />
                    <input type="hidden" name="nextReturn" id="nextReturn" value="" />
                    <label>Catatan :</label><br>
                    <textarea id="notes" name="notes" rows="4" cols="50" required></textarea>
                    <div class="row">
                        <div class="col text-right"><input type="submit" class="btn btn-primary" name="btnLanjut" id="btnLanjut" value="Pinda Tarikh" /></div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection @section('bottomscripts')
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
    $(document).on("click", ".open-Lanjutan", function () {
                var fileId = $(this).data('id');
                var collectDate = $(this).data('collect-date');
                var returnDate = $(this).data('return-date');
                var nextReturn = $(this).data('next-return');
                $(".modal-body #fileId").val( fileId );
                $(".modal-body #collectDate").val( collectDate );
                $(".modal-body #returnDate").val( returnDate );
                $(".modal-body #nextReturn").val( nextReturn );
                document.getElementById("nextReturn").innerHTML = nextReturn;
                document.getElementById("returnDate").innerHTML = returnDate;
            });
</script>
@endsection
