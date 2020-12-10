@extends('layouts.mini',[
'activePage' => 'find-file',
'titlePage' => __('Carian Fail'),
])
@section('topscripts')

@endsection

@section('content')
<form method="POST" action="{{url('carian-fail')}}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="search" class="form-control" id="txtCari" name="txtCari"
                            placeholder="Carian No Fail @ No KP">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" id="btnCari" value="Cari">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!empty($peminjam))
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr class="table-info">
                            <th>#</th>
                            <th>No Fail</th>
                            <th>Nama Peminjam</th>
                            <th>No Kad Pengenalan</th>
                            <th>Lokasi Fail</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjam as $key=>$fail)
                        <tr class="table-warning">
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$fail->file_number}}</td>
                            <td>{{$fail->name}}</td>
                            <td>{{$fail->ic_number}}</td>
                            <td>{{$fail->location}}</td>
                            <td>{{$fail->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @endif

</form>
@endsection

@section('bottomscripts')

@endsection
