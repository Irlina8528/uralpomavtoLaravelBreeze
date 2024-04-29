<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        @vite(['resources/css/bootstrap.min.css', 'resources/css/app.css'])
    </head>
    <body class="antialiased">

    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold">@yield('code')</h1>
            <p class="fs-3 mb-2">@yield('message')</p>

            <a href="/" class="btn px-5 py-2">На главную</a>
        </div>
    </div>


    </body>
</html>
