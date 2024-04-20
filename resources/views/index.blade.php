@extends('templates.main')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class=" purple mb-2 d-flex align-items-center justify-center">
                                    <i class="bi bi-car-front fs-2"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Mobil</h6>
                                <h6 class="font-extrabold mb-0">
                                    {{ $stats['cars'] }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="blue mb-2">
                                    <i class="bi bi-person fs-2"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Pengguna</h6>
                                <h6 class="font-extrabold mb-0">
                                    {{ $stats['users'] }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="green mb-2">
                                    <i class="bi bi-book fs-2"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Peminjaman</h6>
                                <h6 class="font-extrabold mb-0">
                                    {{ $stats['rents'] }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="red mb-2">
                                    <i class="bi bi-arrow-return-left fs-2"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Pengembalian</h6>
                                <h6 class="font-extrabold mb-0">
                                    {{ $stats['returns'] }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="red mb-2">
                                    <i class="bi bi-arrow-return-left fs-2"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Pendapatan bulan ini</h6>
                                <h6 class="font-extrabold mb-0">
                                    Rp. {{ number_format($stats['income'], 0, '.', '.') }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Transakasi Peminjaman {{ \Carbon\Carbon::now()->year }}</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-profile-visit"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ 'assets/compiled/css/iconly.css' }}">
@endpush
@push('scripts')
    <script src="{{ url('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script type="module">
        $.get('{{ route('api.dashboard') }}')
            .then(response => {
                const data = response.map(dt => (dt.count))

                var optionsPeminjamanBulanan = {
                    annotations: {
                        position: "back",
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    chart: {
                        type: "bar",
                        height: 300,
                    },
                    fill: {
                        opacity: 1,
                    },
                    plotOptions: {},
                    series: [{
                        name: "Peminjaman",
                        data,
                    }, ],
                    colors: "#435ebe",
                    xaxis: {
                        categories: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "May",
                            "Jun",
                            "Jul",
                            "Aug",
                            "Sep",
                            "Oct",
                            "Nov",
                            "Dec",
                        ],
                    },
                }
                var chartProfileVisit = new ApexCharts(
                    document.querySelector("#chart-profile-visit"),
                    optionsPeminjamanBulanan
                )

                chartProfileVisit.render()
            }).catch(err => {
                console.error("Error while loaded the dashboard stats")
            })
    </script>
@endpush
