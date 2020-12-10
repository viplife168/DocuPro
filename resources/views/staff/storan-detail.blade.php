@extends('layouts.mini',[
'activePage' => 'staff-storan-detail',
'titlePage' => __('Storan Fail - [Detail]'),
])

@section('topscripts')

@endsection

@section('content')
<form action="" method="post">
    @csrf
    <div class="form-group row">
        <div class="col-md-2">Bilik Fail</div>
        <div class="col-md-10"><strong>
                Bilik Fail Aras 17
            </strong>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">Rak</div>
        <div class="col-md-10"><strong>
                13
            </strong>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">Tingkat</div>
        <div class="col-md-10"><strong>
                2
            </strong>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">Seksyen</div>
        <div class="col-md-10"><strong>
                B
            </strong>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">Kotak</div>
        <div class="col-md-10"><strong>
                5
            </strong>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Tambah Fail</label>
        <div class="col-md-10">
            <div class="input-group">
                <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary btn-small" name="btn-tambah" id="btn-tambah"> Tambah
                        Fail</button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Bilangan Fail</label>
        <div class="col-md-10">
            <strong>
                13
            </strong>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr class="table-info">
                    <th>#</th>
                    <th>No Fail</th>
                    <th>Nama</th>
                    <th>No Kp</th>
                 </tr>
            </thead>
            @if (!empty($fail))
            <tbody>
                @foreach ($fail as $key=>$res)
                <tr class="table-warning">
                    <th scope="row">{{$key+1}}</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
            @else
            <tbody>

                <tr>
                    <th colspan="3">
                        <p>Tiada Fail</p>
                    <th>
                </tr>
            </tbody>
            @endif
        </table>

</form>
@endsection

@section('bottomscripts')
<script src="/mini/libs/select2/js/select2.min.js"></script>
@endsection
