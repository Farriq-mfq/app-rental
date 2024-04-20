@extends('templates.main')
@section('title')
    Tambah Pengguna
@endsection
@section('breadcrumbs')
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Tambah
                </li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="card">

        <div class="card-body">

            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Nama" name="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email" name="email" value="{{ old('email') }}">

                                    @error('email')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        placeholder="Alamat" name="alamat" value="{{ old('alamat') }}">

                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2">No telp</label>
                                    <input type="text" class="form-control  @error('no_telp') is-invalid @enderror"
                                        placeholder="Nomer Telp." name="no_telp" value="{{ old('no_telp') }}">

                                    @error('no_telp')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2">Nomer SIM</label>
                                    <input type="text" class="form-control @error('no_sim') is-invalid @enderror"
                                        placeholder="Nomer SIM." name="no_sim" value="{{ old('no_sim') }}">

                                    @error('no_sim')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password" name="password" value="{{ old('password') }}">

                                    @error('password')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2">Konfirmasi Password</label>
                                    <input type="password"
                                        class="form-control @error('confirmation_password') is-invalid @enderror"
                                        placeholder="Konfirmasi password" name="confirmation_password"
                                        value="{{ old('confirmation_password') }}">

                                    @error('confirmation_password')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
