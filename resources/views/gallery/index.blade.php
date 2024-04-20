@extends('templates.gallery')
@section('content')
    <div class="row">
        @foreach ($cars as $car)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-content">
                        <img src="{{ url('storage/images/' . $car->foto) }}" class="card-img-top img-fluid">

                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $car->merk }}
                            </h5>
                            <p class="card-text">
                                {{ $car->model }} - <br> Rp. {{ number_format($car->tarif, 0, '.', '.') }}
                            </p>
                            <a href="{{ route('rents.index') }}" class="btn btn-primary">
                                Pinjam
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $cars->links() }}
@endsection
