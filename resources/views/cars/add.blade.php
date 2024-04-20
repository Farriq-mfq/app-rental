@extends('templates.main')
@section('title')
    Tambah mobil
@endsection
@section('breadcrumbs')
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cars.index') }}">Mobil</a></li>
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

            <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="merk" class="mb-2">Merk</label>
                                    <input type="text" id="merk"
                                        class="form-control   @error('merk') is-invalid @enderror" name="merk"
                                        value="{{ old('merk') }}">
                                    @error('merk')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="model" class="mb-2">Model</label>
                                    <input type="text" id="model"
                                        class="form-control  @error('model') is-invalid @enderror" name="model"
                                        value="{{ old('model') }}">
                                    @error('model')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="n_plat" class="mb-2">Nomer Plat</label>
                                    <input type="text" id="n_plat"
                                        class="form-control @error('n_plat') is-invalid @enderror" name="n_plat"
                                        value="{{ old('n_plat') }}">
                                    @error('n_plat')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tarif" class="mb-2">Tarif</label>
                                    <input type="number" id="tarif"
                                        class="form-control  @error('tarif') is-invalid @enderror" name="tarif"
                                        value="{{ old('tarif') }}">
                                    @error('tarif')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="stok" class="mb-2">Stok</label>
                                    <input type="number" id="stok"
                                        class="form-control  @error('stok') is-invalid @enderror" name="stok"
                                        value="{{ old('stok') }}">
                                    @error('stok')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="foto" class="mb-2">Foto</label>
                                    <input type="file" id="foto"
                                        class="form-control  @error('foto') is-invalid @enderror" name="foto">
                                    @error('foto')
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
