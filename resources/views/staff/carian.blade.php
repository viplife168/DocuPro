@extends('layouts.mini',[
'activePage' => 'staff-carian',
'titlePage' => __('Carian'),
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
                <div class="col-8">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="search" class="form-control" id="txtCari" name="txtCari"
                                            placeholder="Carian No Fail @ No KP">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="submit" class="form-control btn btn-primary" id="btnSubmit"
                                            name="btnSubmit" value="Cari">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr class="table-info">
                                    <th>#</th>
                                    <th>No Fail</th>
                                    <th>Nama Peminjam</th>
                                    <th>No Kad Pengenalan</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            @if (!empty($peminjam))
                            <tbody>
                                @foreach ($peminjam as $key=>$bFail)
                                <tr class="table-warning">
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$bFail->file_number}}</td>
                                    <td>{{$bFail->name}}</td>
                                    <td>{{$bFail->ic_number}}</td>
                                    <td>{{$bFail->status}}</td>
                                    <td><button type="submit" class="btn btn-success"  name="btnSubmit" id="btnSubmit" value="Tambah-{{$bFail->file_number}}"><i class="uil-plus"></i></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                            @else
                            <tbody>

                                <tr>
                                    <th colspan="3">
                                        <p>Sila mulakan carian fail</p>
                                    <th>
                                </tr>
                            </tbody>
                            @endif
                        </table>

                    </div>
                </div>
                <div class="col-4 bg-darkblue">
                    <h5 class="text-center mt-2 mb-0">Fail dipilih. (Maksimum 50 fail)</h5>
                    <div class="table-responsive p-2">
                        <table class="table">
                            <thead>
                                <tr class="bg-lightred text-white">
                                    <th>#</th>
                                    <th>No Fail</th>
                                    <th class="text-right">Tindakan</th>
                                </tr>
                            </thead>
                            @if (!empty($addedFiles))
                            <tbody>
                                @foreach ($addedFiles as $key=>$aFail)
                                <tr class="text-white">
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$aFail}}</td>
                                    <td class="" style="text-align:right"><button type="submit" class="btn btn-danger"  name="btnSubmit" id="btnSubmit" value="Buang-{{$aFail}}"><i class="uil-minus"></i></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                            @else
                            <tbody>
                                <tr>
                                    <th colspan="2">
                                        <p>Tiada fail dipilih</p>
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
@endsection
