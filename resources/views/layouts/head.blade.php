<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Транспортная компания {{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="@yield('description')">
    
    <link rel="shortcut icon" href="img/Star-w.jpg" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/js/app.js',
     'resources/js/jquery.js', 
     'resources/js/bootstrap.min.js', 
     'resources/js/jasny-bootstrap.min.js',
     'resources/css/bootstrap.min.css',
     'resources/css/app.css'])
     
</head>