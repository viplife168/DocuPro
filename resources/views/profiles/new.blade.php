@extends('layouts.mini',[
'activePage' => 'add-profile',
'titlePage' => __('Tambah Profil'),
])
@section('topscripts')

@endsection

@section('content')
<form class="needs-validation" method="POST" action="{{url('/add-profile')}}" novalidate>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <select data-placeholder="Sila Pilih Bahagian...." class="standardSelect form-control mt-5" tabindex="-1" style="display: none;" id="department" name="department" required>
            <option value="" label="default"></option>
            @foreach ($departments as $department)
            <option value="{{$department}}">{{$department}}</option>
            @endforeach
        </select>

        <div class="form-group mt-3">
            <div class="input-group">
                <div class="input-group-addon">Samb. Telefon</div>
                <input class="form-control" id="phone_ext" name="phone_ext" required>
            </div>
            <small class="form-text text-muted">ex. 6029</small>
            <div class="invalid-feedback">
                Sila masukkan talian sambungan telefon.
              </div>
        </div>

        <div class="form-group mt-3">
            <div class="input-group">
                <div class="input-group-addon">Jawatan</div>
                <input class="form-control" id="designation" name="designation" required>
            </div>
            <small class="form-text text-muted">ex. Penolong Pegawai Teknologi Maklumat</small>
            <div class="invalid-feedback">
                Sila isi jawatan anda.
              </div>
        </div>

        <div class="form-group mt-3">
            <div class="input-group">
                <div class="input-group-addon">Gred</div>
                <input class="form-control" id="gred" name="gred" required>
            </div>
            <small class="form-text text-muted">ex. FA 29</small>
            <div class="invalid-feedback">
                Sila isi gred anda.
              </div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Simpan</button>

    </form>
@endsection

@section('bottomscripts')
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
@endsection


