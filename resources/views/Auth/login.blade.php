@extends('layouts.auth')
@section('title', 'Masuk')

@section('content')

<style>
    .p-t-90 {
        margin-top: -70px;
    }
    .login100-form-logo {
        margin-top: -30px; 
    }
</style>


    <form method="POST" action="{{ route('login-post') }}" class="login100-form validate-form">
        @csrf
        <span class="login100-form-logo">
            <img src="{{ asset('img/belindo.png') }}" alt="Logo belindo" width="90">
        </span>

        <span class="login100-form-title p-b-34 p-t-27">
            Masukkan Akun Anda
        </span>

        <div class="wrap-input100 validate-input" data-validate="Enter email">
            <input class="input100" type="text" name="email" placeholder="Email Anda">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="password" placeholder="Password Anda">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
        </div>

        {{-- <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
            <label class="label-checkbox100" for="ckb1">
                Remember me
            </label>
        </div> --}}

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @endif

        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
                Masuk
            </button>
        </div>

        <div class="text-center p-t-90 txt1">
            Belum Punya Akun?
            <a class="txt1" href="{{ route('register') }}">Daftar Disini</a>
        </div>
        
        
    </form>
@endsection
