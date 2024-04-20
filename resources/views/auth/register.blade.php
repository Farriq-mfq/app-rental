@extends('templates.auth')
@section('content')
    <h1 class="auth-title">Registrasi.</h1>
    <p class="auth-subtitle mb-5">Registrasi ke aplikasi rental v.1.0.0.</p>
    <x-alert></x-alert>
    <form action="{{ route('auth.register.process') }}" method="POST">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl @error('nama') is-invalid @enderror" placeholder="Nama"
                name="nama" value="{{old('nama')}}">
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
            @error('nama')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror"
                placeholder="Email" name="email" value="{{old('email')}}">
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
            @error('email')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl @error('alamat') is-invalid @enderror"
                placeholder="Alamat" name="alamat" value="{{old('alamat')}}">
            <div class="form-control-icon">
                <i class="bi bi-book"></i>
            </div>
            @error('alamat')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl  @error('no_telp') is-invalid @enderror"
                placeholder="Nomer Telp." name="no_telp" value="{{old('no_telp')}}">
            <div class="form-control-icon">
                <i class="bi bi-phone"></i>
            </div>
            @error('no_telp')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl @error('no_sim') is-invalid @enderror"
                placeholder="Nomer SIM." name="no_sim" value="{{old('no_sim')}}">
            <div class="form-control-icon">
                <i class="bi bi-book"></i>
            </div>
            @error('no_sim')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror"
                placeholder="Password" name="password" value="{{old('password')}}">
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
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl @error('confirmation_password') is-invalid @enderror" placeholder="Konfirmasi password"
                name="confirmation_password" value="{{old('confirmation_password')}}">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            @error('confirmation_password')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
            Registrasi
        </button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class="text-gray-600">sudah punya akun? <a href="{{ route('login') }}" class="font-bold">
                Login
            </a>.</p>
    </div>
@endsection
