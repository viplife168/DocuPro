@extends('layouts.mini',[
'activePage' => 'add-staff',
'titlePage' => __('Tambah Staff'),
])

@section('topscripts')

<link href="/mini/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/mini/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/mini/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
@endsection

@section('content')
@php
function check($number){
if($number % 2 == 0){
return "even";
}
else{
return "odd";
}
}
@endphp
<form action="" method="post">
    @csrf
    <div class="card">
        <div class="card-body">

            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable"
                            class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                            aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" style="width: 107px;" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">
                                        Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        style="width: 167px;" aria-label="Position: activate to sort column ascending">
                                        Role
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sysusers as $key=>$user)
                                <tr role="row" class="{{check($key)}}">
                                    <td class="sorting_1 dtr-control">{{$user->name}}</td>

                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <select id="user_role[{{ $user->id }}]" name="user_role[{{ $user->id }}]">
                                                    <option value="{{$user->role}}">Current Role : {{$user->role}}</option>
                                                    <option>Admin</option>
                                                    <option>Supervisor</option>
                                                    <option>Staff</option>
                                                    <option>User</option>
                                                </select>
                                                <input type="submit" value="Set" class="btn btn-primary" id="btn_role[{{ $user->id }}]" name="btn_role[{{ $user->id }}]" >
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</form>
@endsection

@section('bottomscripts')
<script src="/mini/libs/select2/js/select2.min.js"></script>
<script src="/mini/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/mini/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/mini/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/mini/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/mini/libs/jszip/jszip.min.js"></script>
<script src="/mini/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="/mini/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="/mini/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/mini/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/mini/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="/mini/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/mini/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function(){
        $("#datatable").DataTable(),
        $("#datatable-buttons").DataTable({
            lengthChange:!1,buttons:["copy","excel","pdf","colvis"]
        }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
    });
</script>
@endsection
