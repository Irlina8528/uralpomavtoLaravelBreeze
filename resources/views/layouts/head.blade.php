<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Транспортная компания {{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="@yield('description')">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <link rel="stylesheet" href="/css/animate.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
    <script>new WOW().init();</script>

    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/js/jquery.js', 'resources/js/geosuggest.js', 'resources/js/bootstrap.esm.js', 'resources/js/jasny-bootstrap.min.js', 'resources/css/bootstrap.min.css', 'resources/css/app.css', 'resources/css/animate.min.css'])

</head>
