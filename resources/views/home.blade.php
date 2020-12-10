@extends('layouts.mini',[
'activePage' => 'dashboard',
'titlePage' => __('Dashboard'),
])
@section('topscripts')

@endsection

@section('content')
{{ __('You are logged in!') }}
@endsection

@section('bottomscripts')

@endsection
