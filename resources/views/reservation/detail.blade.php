@extends('layouts.mini',[
'activePage' => 'detail-active',
'titlePage' => __('Detail Permohonan Aktif'),
])
@section('topscripts')

@endsection

@section('content')
@php
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SysSettingController as Sys;
@endphp

<div class="row">
    <div class="col-8">
        <p>
            <label>No Permohonan :</label>
            <strong>{{$res->id}}</strong>
        </p>
        <p>
            <label>Tarikh Permohonan :</label>
            <strong>{{Sys::viewableDate($res->apply_date)}}</strong>
        </p>
        <div class="row">
            <div class="col-6">
                <p>
                    <label>Tarikh Jangka Pungut :</label>
                    <strong>{{Sys::viewableDate($res->collection_date)}}</strong>
                </p>

            </div>
            <div class="col-6">
                <p>
                    <label>Tarikh Jangka Pulang :</label>
                    <strong>{{Sys::viewableDate($res->return_date)}}</strong>
                </p>

            </div>

        </div>
        <p>
            <label>Status Permohonan :</label>
            <strong>{{$res->res_status}}</strong>
        </p>
        <p>
            <label>Catatan :</label>
            <strong>{{$res->res_notes}}</strong>
        </p>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr class="table-info">
                        <th>#</th>
                        <th>No Fail</th>
                        <th>Pegawai</th>
                        <th>Status</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
@foreach ($files as$key=>$file)
<tr class="table-warning">
    <th scope="row">{{$key+1}}</th>
    <td>{{$file->file_number}}</td>
    <td>{{$file->incharge_officer}}</td>
    <td>{{$file->file_status}}</td>
    <td></td>
</tr>
@endforeach


                </tbody>
            </table>

        </div>
    </div>

    @endsection

    @section('bottomscripts')

    @endsection
