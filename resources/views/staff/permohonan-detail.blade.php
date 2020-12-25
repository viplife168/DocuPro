@extends('layouts.mini',[
'activePage' => 'staff-permohonan-detail',
'titlePage' => __('Detail Permohonan'),
])

@section('topscripts')
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
        <span class=""><strong>{{date('d-m-Y', strtotime(str_replace('/', '-', $reservation->apply_date)))}}</strong></span><br>
        <span class=""><strong>{{date('d-m-Y', strtotime(str_replace('/', '-', $reservation->collection_date)))}}</strong></span><br>
        <span class=""><strong>{{date('d-m-Y', strtotime(str_replace('/', '-', $reservation->return_date)))}}</strong></span><br>
        <span class=""><strong>{{$reservation->res_status}}</strong></span><br>
        <span class=""><strong>{{$reservation->res_notes}}</strong></span><br>
    </div>
</div>
<div class="row pt-3    ">
    <div class="col-md-12">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
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
