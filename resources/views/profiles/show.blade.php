@extends('layouts.mini',[
'activePage' => 'profile',
'titlePage' => __('Profil'),
])
@section('topscripts')

@endsection

@section('content')
@php
    use App\Http\Controllers\ProfileController as Profile;
@endphp
<div>
    <div class="float-right">
        <button type="button" class="btn btn-primary btn-block"  onclick="window.location='{{ url("edit-profile") }}'">Edit Profile</button>

    </div><br>
    <img src="{{Profile::getAvatar()}}" alt="" class="rounded-circle avatar-lg">

</div>
@endsection

@section('bottomscripts')

@endsection
