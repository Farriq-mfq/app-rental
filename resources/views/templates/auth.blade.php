<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
    <link rel="stylesheet" href="{{ url('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ url('assets/compiled/css/auth.css') }}">
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6 mx-auto col-12">
                <div id="auth-left">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>
</body>

</html>
