@extends('layouts.mini',[
'activePage' => 'staff-agihan-tugas',
'titlePage' => __('Agihan Tugas'),
])

@section('topscripts')

@endsection

@section('content')
<form method="POST" action="{{url('staff/carian')}}">
    @csrf
    <div class="card">
        <div class="card-header text-white bg-success">
            <strong>Fail Pinjaman </strong>
        </div>
        <div class="card-body">


            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="row">


                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr class="table-info">
                                    <th>#</th>
                                    <th>Nama Peminjam</th>
                                    <th>Bah/Caw/seksyen</th>
                                    <th>Tarikh Mohon</th>
                                    <th>Bilangan Fail</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            @if (!empty($peminjam))
                            <tbody>
                                @foreach ($peminjam as $key=>$bFail)
                                <tr class="table-warning">
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$bFail->name}}</td>
                                    td>{{$bFail->Bah/Caw/seksyen}}</td>
                                    <td>{{$bFail->Tarikh_Mohon}}</td>
                                    <td>{{$bFail->status}}</td>
                                    <td><button type="submit" class="btn btn-success"  name="btnSubmit" id="btnSubmit" value="Tambah-{{$bFail->file_number}}"><i class="uil-plus"></i></button></td>
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
                </div>

            </div>

        </div>
        <input type="submit" class="form-control btn btn-primary" id="btnSubmit" name="btnSubmit" value="Hantar">
    </div>
</form>
@endsection

@section('bottomscripts')
<script src="/mini/libs/select2/js/select2.min.js"></script>
@endsection
