@extends('layouts.mini',[
'activePage' => 'staff-permohonan',
'titlePage' => __('Senarai Permohonan'),
])

@section('topscripts')
@endsection

@php
    use App\Http\Controllers\ReservationController;
    use App\Http\Controllers\SysSettingController as Sys;
@endphp

@section('content')
<form method="POST" action="{{url('permohonan-aktif')}}">
    @csrf
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr class="table-info">
                    <th>#</th>
                    <th>Tarikh Permohonan</th>
                    <th style="text-align: center">Bilangan Fail</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            @if (!empty($new_reservation))
            <tbody>
                @foreach ($new_reservation as $key=>$res)
                @php
                    $file_count = ReservationController::countFileDetails($res->id);
                @endphp
                <tr class="table-warning">
                    <th scope="row">{{$key+1}}</th>
                    <td>{{Sys::viewableDate($res->apply_date)}}</td>
                    <td style="text-align: center">{{$file_count}}</td>
                    <td>{{$res->res_status}}</td>
                    <td>
                        <a href="{{url('/staff/permohonan-baru/'.$res->id)}}" class="button btn btn-sm btn-success">Lihat Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @else
            <tbody>

                <tr>
                    <th colspan="3">
                        <p>Tiada Permohonan Baru</p>
                    <th>
                </tr>
            </tbody>
            @endif
        </table>

    </div>
</form>
@endsection

@section('bottomscripts')
@endsection
