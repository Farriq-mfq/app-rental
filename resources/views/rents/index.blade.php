@extends('templates.main')
@section('title')
    Peminjaman
@endsection
@section('breadcrumbs')
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Peminjaman
                </li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Manajemen Peminjaman
            <div class="mt-2">
                <x-alert></x-alert>
            </div>
            <form method="POST" action="{{ route('rents.store') }}">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mulai" class="mb-2">Tanggal Mulai</label>
                                    <input type="date" id="mulai"
                                        class="form-control   @error('mulai') is-invalid @enderror" name="mulai"
                                        value="{{ old('mulai') }}">
                                    @error('mulai')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="selesai" class="mb-2">Tanggal Selesai</label>
                                    <input type="date" id="selesai"
                                        class="form-control   @error('selesai') is-invalid @enderror" name="selesai"
                                        value="{{ old('selesai') }}">
                                    @error('selesai')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="kode" class="mb-2">Kode Plat Mobil</label>
                                    <input type="text" id="kode"
                                        class="form-control  @error('kode') is-invalid @enderror" name="kode"
                                        value="{{ old('kode') }}">
                                    @error('kode')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ktp" class="mb-2">No KTP</label>
                                    <input type="text" id="ktp"
                                        class="form-control  @error('ktp') is-invalid @enderror" name="ktp"
                                        value="{{ old('ktp') }}">
                                    @error('ktp')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama" class="mb-2">Nama Peminjam</label>
                                    <input type="text" id="nama"
                                        class="form-control  @error('nama') is-invalid @enderror" name="nama"
                                        value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="mobil" class="mb-2">Pilih Mobil</label>
                                    <select class="choices form-select @error('mobil') is-invalid @enderror" name="mobil">
                                        @if (empty(old('mobil')))
                                            <option selected>--Pilih Mobil--</option>
                                        @endif
                                        @foreach ($cars as $car)
                                            <option @selected(!empty(old('mobil')) && old('mobil') === $car->id) value="{{ $car->id }}">
                                                {{ $car->merk }} - {{ $car->model }}
                                                (Rp.{{ number_format($car->tarif) }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('mobil')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                <i class="bi bi-archive-fill me-1"></i>
                                Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="{{ url('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush
@push('scripts')
    {{ $dataTable->scripts() }}
    <script src="{{ url('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ url('assets/static/js/pages/form-element-select.js') }}"></script>
@endpush
