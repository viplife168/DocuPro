@extends('layouts.blank')


@section('topscripts')
<style>
    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
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
</style>

@endsection

@section('content')
<div class="container" style="height: auto;">
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
    <div class="row align-items-center">
        <div class="col-md-9 ml-auto mr-auto mb-3 text-center pt-3">
            <img src="mini/images/logo-dark.png" height="40%" width="40%">
        </div>
        <div class="col-lg-6 col-md-8 col-sm-10 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
