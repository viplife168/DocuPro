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
    <hr>
    <form name="addfile" class="repeater" method="POST" enctype="multipart/form-data">
        @csrf
        <div data-repeater-list="file_list">
            <div data-repeater-item class="row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="file_number" name="file_number"aria-label="File Number" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button data-repeater-delete class="btn btn-danger btn-outline-secondary" type="button">Delete</button>
                    </div>
                  </div>
            </div>

        </div>
        <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" id="btn-tambah" name="btn-tambah" autofocus value="Tambah"/>
    <br>
    <br>
    <input type="submit" class="btn btn-block btn-primary" value="Simpan"/>
    </form>
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
            @if (!empty($files))
            <tbody>
                @foreach ($files as $key=>$res)
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
