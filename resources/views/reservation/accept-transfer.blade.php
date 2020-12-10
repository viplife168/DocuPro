@extends('layouts.mini',[
'activePage' => 'accept-transfer',
'titlePage' => __('Penerimaan Pindahan'),
])
@section('topscripts')

@endsection

@section('content')
<div class="row">
    <div class="col">
        @if (count($transfers)!=0)
        <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>No Fail</th>
                        <th>Tarikh Pinjam</th>
                        <th>Tarikh Pulang</th>
                        <th>Catatan</th>
                        <th>Pindah Fail</th>
                    </tr>
                </thead>


                <tbody>

                    @foreach ($transfers as $key=>$transfer)
                    <tr class="{{Sys::classDateCompare($transfer->res_return_date)}}">
                        <td>{{$key+1}}</td>
                        <td>{{$transfer->file_number}}</td>
                        <td>{{Sys::viewableDate($transfer->res_collect_date)}}</td>
                        <td>{{Sys::viewableDate($transfer->res_return_date)}}</td>
                        <td>{{$transfer->file_notes}}</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" class="pindah" id="{{$transfer->file_number}}"
                                    data-Id="{{$transfer->id}}" data-fileId="{{$transfer->file_number}}"
                                    name="{{$transfer->file_number}}">
                                <span class="slider"></span>
                            </label>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
            <input class="form-control" type="hidden" name="files" id="files">
            <div class="form-group">
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </div>
        @else
        <h3><strong>Tiada Pindahan Fail</strong></h3>
        <div class="form-group">
            <div class="row">
                <button type="submit" disabled class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('bottomscripts')

@endsection
