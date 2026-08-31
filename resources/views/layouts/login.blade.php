<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gopinathan : Admin : Login </title>

    <link rel="stylesheet" href="{{ asset('dist/css/back-end/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/bootstrap-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/lineicons.css') }} " />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/fullcalendar.css') }} " />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/main.css') }} " />
    <link rel="stylesheet" href="{{ asset('dist/css/back-end/backenddeveloper.css') }} " />
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('dist/js/jquery-latest.min.js') }} "></script>
    <script src="{{ asset('dist/js/locomotive.js') }} "></script>
    <script src="{{ asset('dist/js/menu.js') }} "></script>
</head>

<body>

    <main class="login-wrapper">
        @yield('content')

        <footer class="footer">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 order-last order-md-first">
                        <div class="copyright text-center text-md-start">
                            <p class="text-sm" style="color: white;"> Developed by Puratech Consultancy Solutions Pvt.
                                Ltd. </a> </p>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

    </main>


</body>

</html>
