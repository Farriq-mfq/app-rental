@extends('templates.main')
@section('title')
    Pengembalian
@endsection
@section('breadcrumbs')
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Pengembalian
                </li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Manajemen Pengembalian
            <div class="mt-2">
                <x-alert></x-alert>
            </div>
            <form method="POST" action="{{ route('return-rents.store') }}">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="mulai" class="mb-2">Masukan kode</label>
                                <input type="text" id="kode"
                                    class="form-control   @error('kode') is-invalid @enderror" name="kode"
                                    value="{{ old('kode') }}">
                                @error('kode')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                <i class="bi bi-arrow-return-left me-1"></i>
                                Kembalikan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    @endsection


    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
