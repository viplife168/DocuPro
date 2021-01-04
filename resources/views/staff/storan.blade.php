@extends('layouts.mini',[
'activePage' => 'staff-storan',
'titlePage' => __('Storan Fail'),
])

@section('topscripts')

@endsection

@section('content')
<form action="{{url("/staff/storan-detail")}}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Bilik Fail</label>
        <div class="col-md-10">
            <select class="custom-select select2">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>


    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Rak</label>
        <div class="col-md-10">
            <select class="custom-select select2">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Tingkat</label>
        <div class="col-md-10">
            <select class="custom-select select2">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Seksyen</label>
        <div class="col-md-10">
            <select class="custom-select select2">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
<button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light mb-1">Pilih Lokasi Storan</button>
</form>
@endsection

@section('bottomscripts')
<script src="/mini/libs/select2/js/select2.min.js"></script>
@endsection
