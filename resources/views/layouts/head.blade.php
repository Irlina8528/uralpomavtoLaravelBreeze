<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="/img/Star-w.jpg" type="image/x-icon">
    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/js/bootstrap.min.js'])
</head>