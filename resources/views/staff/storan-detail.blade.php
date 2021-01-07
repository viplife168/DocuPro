@extends('layouts.mini',[
'activePage' => 'staff-storan-detail',
'titlePage' => __('Storan Fail - [Detail]'),
])

@section('topscripts')
<style>
    .highlight {
        background-color: yellow;
    }
</style>
@endsection

@section('content')
<form name="addfile" class="repeater" action="/staff/submit-tambah-storan" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-md-2">Bilik Fail</div>
        <div class="col-md-10">
            <input id="bilik_fail" class="" name="bilik_fail" style="border:none;font-weight:bold;width:100%;" value="{{$bilik_fail}}" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">Rak</div>
        <div class="col-md-10">
            <input id="rak" name="rak" style="border:none;font-weight:bold;" value="{{$rak}}" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">Tingkat</div>
        <div class="col-md-10">
            <input id="tingkat" name="tingkat" style="border:none;font-weight:bold;" value="{{$tingkat}}" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">Seksyen</div>
        <div class="col-md-10">
            <input id="seksyen" name="seksyen" style="border:none;font-weight:bold;" value="{{$seksyen}}" />
        </div>
    </div>
    <hr class="pt-3">
    <div data-repeater-list="file_list">
        <div data-repeater-item class="row">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="file_number" name="file_number" aria-label="File Number"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button data-repeater-delete class="btn btn-danger btn-outline-secondary"
                        type="button">Delete</button>
                </div>
            </div>
        </div>

    </div>
    <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" id="btn-tambah" name="btn-tambah"
        autofocus value="Tambah" />
    <br>
    <br>
    <input type="submit" id="btn-simpan" name="btn-simpan" class="btn btn-block btn-primary" value="Simpan" />
</form>
<div class="form-group row">
    <label class="col-md-6 col-form-label mt-3" style="width: 100%">Bilangan Fail Terkini di <strong>{{$fails['location']}} : [-<span style="color: red"> {{$fails['count']}} </span>-]</strong></label>
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
        @if ($fails['count'] >0)
        <tbody>
            @foreach ($fails['files'] as $key=>$res)
            <input type="hidden" id="files[]" name="files[]" value="{{$res}}" />
            <tr class="table-warning">
                <th scope="row">{{$key+1}}</th>
                <td>{{$res->file_number}}</td>
                <td>{{$res->name}}</td>
                <td>{{$res->ic_number}}</td>
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

    @endsection

    @section('bottomscripts')
    <script>

    </script>
    <script src="/mini/libs/select2/js/select2.min.js"></script>
    <script src="/mini/libs/jquery.repeater/jquery.repeater.min.js"></script>
    <script src="/mini/js/pages/form-repeater-storan-detail.int.js"></script>
    @endsection
