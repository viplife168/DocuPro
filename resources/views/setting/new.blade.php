@extends('layouts.mini',[
'activePage' => 'add-setting',
'titlePage' => __('Tambah Setting'),
])
@section('topscripts')

@endsection

@section('content')
<form class="repeater" method="POST" enctype="multipart/form-data">
    @csrf
    <div data-repeater-list="setting">
        <div data-repeater-item class="row">
            <div  class="form-group col-lg-2">
                <label for="name">Key</label>
                <input type="text" id="setting_key" name="setting_key" class="form-control"/>
            </div>
            <div  class="form-group col-lg-2">
                <label for="subject">Value</label>
                <input type="text" id="setting_value" name="setting_value" class="form-control"/>
            </div>

            <div class="col-lg-2 align-self-center">
                <input data-repeater-delete type="button" class="btn btn-primary btn-block" value="Delete"/>
            </div>
        </div>

    </div>
    <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Tambah"/>
<br>
<br>
<input type="submit" class="btn btn-block btn-primary" value="Simpan"/>
</form>
@endsection

@section('bottomscripts')
<script src="mini/libs/jquery.repeater/jquery.repeater.min.js"></script>

<script src="mini/js/pages/form-repeater.int.js"></script>

@endsection
