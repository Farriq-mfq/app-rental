<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title') | {{ env('APP_NAME') }}
    </title>
    <link rel="stylesheet" href="{{ url('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('assets/compiled/css/app-dark.css') }}">
    @stack('styles')
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <x-sidebar></x-sidebar>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>
                                @yield('title')
                            </h3>
                        </div>
                        @yield('breadcrumbs')
                    </div>
                </div>
                <section class="section">

                    @yield('content')
                </section>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
    <script src="{{ url('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/compiled/js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>
