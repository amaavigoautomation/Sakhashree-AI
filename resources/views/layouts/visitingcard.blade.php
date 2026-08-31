<!DOCTYPE html>
<html lang="en">

<head>
    <?php $defaultImage = secure_asset('/'); ?>
    <base href="{{ url('/') }}/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ !empty($seoData['page_title']) ? $seoData['page_title'] : 'Gopinathan Chakra Healer' }}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('dist/img/favicon.ico') }}" type="image/x-icon">

    <!-- External CSS Files -->
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/form.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/VisitingCard/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dist/css/front-end/font-awesome.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('/dist/fonts/frontend-fonts/fonts/css/all.css') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;600;700&family=Lora:ital@0;1&family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Script -->
    <script src="{{ asset('dist/js/jquery-latest.min.js') }} "></script>
    <script src="{{ asset('dist/js/Frontend/bootstrap.bundle.min.js') }} "></script>
</head>

<body>
    <main class="mainwrapper">
        <!-- Page Content -->
        @yield('content')
    </main>

</body>

</html>
