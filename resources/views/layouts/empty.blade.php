<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @extends('layouts.head')
    <body class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="wrapper btn-outline-none mt-3 mb-3">
            @yield('content')
        </div>
    </body>
</html>
