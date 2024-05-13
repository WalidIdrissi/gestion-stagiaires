<title>Login</title>
<style>
    .login-error {
        margin-top: -30px;
    }
</style>
@extends('layouts.app')

<div style="background-color: skyblue; height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="container row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/loginIMG.jpg') }}" alt="loginIMG" style="width: 250px; display: block; margin: auto;">
                <span class="card-title" style="height:60px;">@section('content')</span>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            {{-- @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            {{-- @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                @endsection
