@extends('layouts.blank',[
'activePage' => 'welcome',
'titlePage' => __('Welcome'),
])
@section('topscripts')


<style>
    html,
    body {
        background-color: #000;
        color: #fff;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #bfcbd1;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .subtext {
        color: #bfcbd1;
        margin-top: 0px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        text-align: center;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    @endif

    <div class="centered">
        <div class="row">
            <div class="col align-right">
                <img src="images\logo2.png">
            </div>
            <div class="col">
                <div class="title mb-0 pb-0">
                    BilikFail
                </div>
                <div class="subtext mt-0 pt-0">
                    [- Filing system for CRD -]
                </div>
            </div>
        </div>






    </div>

@endsection

@section('bottomscripts')

@endsection
