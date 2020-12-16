@extends('layouts.mini',[
'activePage' => 'Pengguna-Sistem-Detail',
'titlePage' => __('Pengguna-Sistem-Detail'),
])
@section('topscripts')

@endsection

@section('content')
<form method="POST" action="{{url('pindahan-dalaman-kepada')}}">
    @csrf
    <div class="form-group">
        <div class="row">
                <div class="col-3">
                    <span><label for="sender"> Nama :</label></span>
                </div>
        <div class="col">
                <div class="col-10">
                    <input class="form-control" type="text" name="penerima" id="penerima" required>
                </div>
        </div>
    </div>
<br>

        <div class="row">
                <div class="col-3">
                    <span><label for="sender"> Cawangan :</label></span>
                </div>
        <div class="col">
                <div class="col-10">
                    <input class="form-control" type="text" name="cawangan" id="cawangan" required>
                </div>
        </div>
    </div>
    <br>

    <div class="row">
                <div class="col-3">
                    <span><label for="sender"> Extension :</label></span>
                </div>
        <div class="col">
                <div class="col-12">
                    <input class="form-control" type="text" name="extension" id="extension" required>
                </div>
        </div>

        <br>

    <div class="col">

        <div class="col-6">
                <div class="col">
                <button type="submit" disabled class="btn btn-primary btn-block">Hantar</button>
                </div>
        </div>
        </div>






</form>
@endsection

@section('bottomscripts')

@endsection
