@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="/source/img/logo.png" />
            <p id="profile-name" class="profile-name-card"></p>
            @if (isset($error_account))
                <div class="alert alert-danger" role="alert">
                    {{$error_account}}
               </div>
            @endif
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" id="password" name="password" required autocomplete="current-password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">LOGIN</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection