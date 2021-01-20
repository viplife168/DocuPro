@extends('layouts.mini',[
'activePage' => 'staff-permohonan-detail',
'titlePage' => __('Detail Permohonan'),
])

@section('topscripts')
<link href="/mini/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/mini/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="row">
    <div class="col-md-3">
        <span class="">Bahagian/Cawangan/Unit</span><br>
        <span class="">Pemohon</span><br>
        <span class="">Tarikh Permohonan</span><br>
        <span class="">Tarikh Jangka Pungut</span><br>
        <span class="">Tarikh Jangka Pulang</span><br>
        <span class="">Status</span><br>
        <span class="">Nota</span><br>
    </div>
    <div class="col-md-9">
        <span class=""><strong>{{$reservation->department}}</strong></span><br>
        <span class=""><strong>{{$user_name}}</strong></span><br>
        <span
            class=""><strong>{{date('d-m-Y', strtotime(str_replace('/', '-', $reservation->apply_date)))}}</strong></span><br>
        <span
            class=""><strong>{{date('d-m-Y', strtotime(str_replace('/', '-', $reservation->collection_date)))}}</strong></span><br>
        <span
            class=""><strong>{{date('d-m-Y', strtotime(str_replace('/', '-', $reservation->return_date)))}}</strong></span><br>
        <span class=""><strong>{{$reservation->res_status}}</strong></span><br>
        <span class=""><strong>{{$reservation->res_notes}}</strong></span><br>
    </div>
</div>
<div class="row pt-3">
    <div class="col-md-12">
        <form action="" method="post">
            @csrf
            @php
            $res = $reservation->toArray();
            @endphp
            @foreach ($res as $key=>$res)
            <input type="hidden" id="reservation[{{$key}}]" name="reservation[{{$key}}]" value="{{$res}}">
            @endforeach


            @if ($user->role != 'staff')
            <div class="row">
                <div class="col form-group">
                    <select class="form-control custom-select select2" id="allToStaff" name="allToStaff">
                        <option value="">Sila Pilih Staff Untuk Semua Fail....</option>
                        @foreach ($myStaff as $staff)
                        <option>{{$staff->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            <table class="table table-hover table-sm">
                <thead>
                    <tr class="table-warning">
                        <th>#</th>
                        <th>No Fail</th>
                        <th>Peminjam</th>
                        <th>No Kp</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($file_details as $key=>$file)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$file->file_number}}</td>
                        <td>{{$file->name}}</td>
                        <td>{{$file->ic_number}}</td>
                        <td>
                            @if ($user->role != 'staff')
                            <select class="form-control custom-select select2" id="select[{{$file->file_number}}]"
                                name="select[{{$file->file_number}}]">
                                <option value="">Sila Pilih Staff....</option>
                                @foreach ($myStaff as $staff)
                                <option>{{$staff->name}}</option>
                                @endforeach
                            </select>
                            @else
                            <select class="form-control custom-select select2" id="status_fail[{{$file->file_number}}]"
                                name="status_fail[{{$file->file_number}}]">
                                <option value="">Status Fail</option>
                                <option>Sedia Dikutip</option>
                                <option>Tidak Dijumpai</option>
                                <option>Telah Dipinjam</option>
                            </select>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary btn-block" name="btn-submit-agihan" id="btn-submit-agihan"
                value="Simpan">
        </form>
    </div>

</div>





@endsection

@section('bottomscripts')
<script src="/mini/libs/select2/js/select2.min.js"></script>
<script src="/mini/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/mini/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

@endsection
