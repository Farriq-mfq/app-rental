@extends('templates.main')
@section('title')
    Users
@endsection
@section('breadcrumbs')
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Users
                </li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Manajemen Users <a href="{{ route('users.create') }}" class="btn btn-primary ms-2 btn-sm">
                <i class="bi bi-plus"></i>
                Tambah Pengguna</a>
            <div class="mt-2">
                <x-alert></x-alert>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection


@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
