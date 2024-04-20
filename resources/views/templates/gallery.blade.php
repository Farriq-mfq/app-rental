<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | {{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <nav class="navbar navbar-light">
        <div class="container d-flex align-items-center">
            <a href="{{ route('dashboard') }}"><i class="bi bi-chevron-left"></i></a>
            <h3 class="ms-4 d-inline">
                Gallery
            </h3>
        </div>
    </nav>


    <div class="container">
        @yield('content')
    </div>

    <script src="{{ url('assets/compiled/js/app.js') }}"></script>

</body>

</html>
