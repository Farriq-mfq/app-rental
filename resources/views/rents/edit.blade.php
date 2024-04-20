@extends('templates.main')
@section('title')
    Edit Peminjaman
@endsection
@section('breadcrumbs')
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Edit Peminjaman
                </li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Edit Peminjaman
            <div class="mt-2">
                <x-alert></x-alert>
            </div>
            <form method="POST" action="{{ route('rents.update', ['rent' => $rent->id]) }}">
                @csrf
                @method('PATCH')
                <div class="form-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mulai" class="mb-2">Tanggal Mulai</label>
                                    <input type="date" id="mulai"
                                        class="form-control   @error('mulai') is-invalid @enderror" name="mulai"
                                        value="{{ $rent->mulai }}">
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
                                        value="{{ $rent->selesai }}">
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
                                    <label for="ktp" class="mb-2">No KTP</label>
                                    <input type="text" id="ktp"
                                        class="form-control  @error('ktp') is-invalid @enderror" name="ktp"
                                        value="{{ $rent->no_ktp }}">
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
                                        value="{{ $rent->nama }}">
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
                                        @foreach ($cars as $car)
                                            <option @selected($car->id === $rent->car->id) value="{{ $car->id }}">
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
                                Update</button>
                            <a href="{{ route('rents.index') }}" class="btn btn-danger me-1 mb-1">
                                Batal</a>
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
