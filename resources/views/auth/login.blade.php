@extends('templates.auth')
@section('content')
    <h1 class="auth-title">Masuk.</h1>
    <p class="auth-subtitle mb-5">Masuk ke aplikasi rental v.1.0.0.</p>
    <x-alert></x-alert>
    <form action="{{ route('auth.login.process') }}" method="POST">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" name="email">
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
            @error('email')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            @error('password')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-check form-check-lg d-flex align-items-end">
            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                Keep me logged in
            </label>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class="text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="font-bold">Registrasi</a>.</p>
        <p><a class="font-bold" href="auth-forgot-password.html">Lupa password </a></p>
    </div>
@endsection
