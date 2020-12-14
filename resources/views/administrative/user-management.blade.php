@extends('layouts.mini',[
'activePage' => 'user-management',
'titlePage' => __('Pengguna Sistem'),
])

@section('topscripts')

@endsection

@section('content')
<form action="" method="post">
    @csrf

</form>
@endsection

@section('bottomscripts')
<script src="/mini/libs/select2/js/select2.min.js"></script>
@endsection
