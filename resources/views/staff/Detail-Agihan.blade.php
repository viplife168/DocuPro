@extends('layouts.mini',[
'activePage' => 'Detail-Agihan',
'titlePage' => __('Detail Agihan'),
])
@section('topscripts')

@endsection

@section('content')
<form method="POST" action="">
    @csrf

    <div class="form-group row">
        <label class="col-md-2 col-form-label">Agih Semua</label>
        <div class="col-md-6">
            <select class="custom-select select2">
                <option selected>Sila Pilih Nama Staf</option>
                <option value="1">Datin</option>
                <option value="2">CT AMI</option>
                <option value="3">Abang Long</option>
                <option value="3">Amerul</option>
                <option value="3">Siti Suria</option>
            </select>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light mb-1" style="font-size:13px">Pilih</button>
        </div>
</div>

    <div class="card">

        <div class="card-body">


            <div class="row">
                <div class="col">

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr class="table-info">
                                    <th>#</th>
                                    <th>Nombor Fail</th>
                                    <th>Pilih Staff</th>
                                </tr>
                            </thead>
                            @if (!empty($peminjam))
                            <tbody>
                                @foreach ($peminjam as $key=>$bFail)
                                <tr class="table-warning">
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$bFail->name}}</td>
                                    <td>{{$bFail->Pilih_Staff}}</td>
                                    <td><button type="submit" class="btn btn-success"  name="btnSubmit" id="btnSubmit" value="Tambah-{{$bFail->file_number}}"><i class="uil-plus"></i></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                            @else
                            <tbody>

                                <tr>
                                    <th colspan="table-responsive">
                                        <p>Tiada Permohonan Baru</p>
                                    <th>
                                    <div class="col-md-8">
                                        <select class="custom-select select2" >
                                        <option selected>Sila Pilih Nama Staf</option>
                                        <option value="1">Datin</option>
                                        <option value="2">CT AMI</option>
                                        <option value="3">Abang Long</option>
                                        <option value="3">Amerul</option>
                                        <option value="3">Siti Suria</option>
                                        </select>
                                    </div>
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
