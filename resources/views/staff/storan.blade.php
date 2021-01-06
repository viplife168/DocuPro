@extends('layouts.mini',[
'activePage' => 'staff-storan',
'titlePage' => __('Storan Fail'),
])

@section('topscripts')

@endsection

@section('content')
@php
use App\Http\Controllers\StorageController;
$bilik_fails = StorageController::getBilikFail();
$raks = StorageController::getRak();
$tingkats = StorageController::getTingkat();
$seksyens = StorageController::getSeksyen();
@endphp
<form action="{{url("/staff/storan")}}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Bilik Fail</label>
        <div class="col-md-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <select class="custom-select select2" name="bilik_fail" id="bilik_fail">
                            <option value="{{$bilik_fail ?? ''}}" selected>{{$bilik_fail ?? 'SILA PILIH BILIK FAIL'}}</option>
                            @foreach ($bilik_fails as $bilik_fail)
                            <option>{{strtoupper($bilik_fail)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#TambahBilikFail">
                    Tambah Bilik Fail Baru
                </button>
            </div>
        </div>


    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Rak</label>
        <div class="col-md-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <select class="custom-select select2" name="rak" id="rak">
                            <option value="{{$rak ?? ''}}" selected>{{$rak ?? 'SILA PILIH RAK'}}</option>
                            @if ($raks!="")
                            @foreach ($raks as $rak)
                            <option>{{strtoupper($rak)}}</option>
                            @endforeach
                            @else

                            @endif

                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#TambahRak">
                    Tambah Rak Baru
                </button>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Tingkat</label>
        <div class="col-md-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <select class="custom-select select2" name="tingkat" id="tingkat">
                            <option value="{{$tingkat ?? ''}}" selected>{{$tingkat ?? 'SILA PILIH TINGKAT'}}</option>
                            @if ($tingkats!="")
                            @foreach ($tingkats as $tingkat)
                            <option>{{strtoupper($tingkat)}}</option>
                            @endforeach
                            @else
                            @endif
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#TambahTingkat">
                    Tambah Tingkat Baru
                </button>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Seksyen</label>
        <div class="col-md-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <select class="custom-select select2" name="seksyen" id="seksyen">
                            <option value="{{$seksyen ?? ''}}" selected>{{$seksyen ?? 'SILA PILIH SEKSYEN'}}</option>
                            @if ($seksyens!="")
                            @foreach ($seksyens as $seksyen)
                            <option>{{strtoupper($seksyen)}}</option>
                            @endforeach
                            @else
                            @endif
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#TambahSeksyen">
                    Tambah Seksyen Baru
                </button>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light mb-1">Pilih Lokasi
        Storan</button>


    <div class="modal fade" id="TambahBilikFail" tabindex="-1" role="dialog" aria-labelledby="TambahBilikFailLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TambahBilikFailLabel">Tambah Bilik Fail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input name="bilik_fail_baru" class="form-control text-center" id="bilik_fail_baru"
                        autocomplete="off" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="btn_tambah" name="btn_tambah"
                        value="bilik-fail" class="btn btn-primary">Tambah Bilik Fail</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="TambahRak" tabindex="-1" role="dialog" aria-labelledby="TambahRakLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TambahRakLabel">Tambah Rak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input name="rak_baru" class="form-control text-center" id="rak_baru" autocomplete="off" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="btn_tambah" name="btn_tambah" value="rak"
                        class="btn btn-primary">Tambah Rak</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="TambahTingkat" tabindex="-1" role="dialog" aria-labelledby="TambahTingkatLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahTingkatLabel">Tambah Tingkat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input name="tingkat_baru" class="form-control text-center" id="tingkat_baru" autocomplete="off" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" id="btn_tambah" name="btn_tambah" value="tingkat"
                    class="btn btn-primary">Tambah Tingkat</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="TambahSeksyen" tabindex="-1" role="dialog" aria-labelledby="TambahSeksyenLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="TambahSeksyenLabel">Tambah Seksyen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input name="seksyen_baru" class="form-control text-center" id="seksyen_baru" autocomplete="off" />
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" id="btn_tambah" name="btn_tambah" value="seksyen"
                class="btn btn-primary">Tambah Seksyen</button>
        </div>
    </div>
</div>
</div>

</form>
@endsection

@section('bottomscripts')
<script src="/mini/libs/select2/js/select2.min.js"></script>
@endsection
