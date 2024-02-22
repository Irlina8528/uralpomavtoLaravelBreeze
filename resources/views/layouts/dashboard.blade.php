<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.head')
@section('title')Личный кабинет@endsection
@vite(['resources/css/jasny-bootstrap.min.css', 'resources/css/navmenu.css'])

<body>
    <header class="hidden-md hidden-lg">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="offcanvas" data-target=".navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="/img/logo.svg" alt="УралПромАвто" class="header__logo">
                </a>

            </div>
        </nav>
    </header>
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm Offcanvas">
        <a href="{{ route('home') }}" class="w-100 nav-link">
            На главную
        </a>
        @if (Auth::user()->userType->name == 'user')
            <ul class="nav navmenu-nav flex-column">
                <li class="w-100">
                    <a href="{{ route('user-orders') }}"
                        class="nav-link {{ request()->is('orders') ? 'active' : '' }}">
                        Мои заказы
                    </a>
                </li>
                <li class="w-100">
                    <a href="#" class="nav-link">
                        Поддержка
                    </a>
                </li>
                <li class="w-100">
                    <a href="{{ route('profile.edit') }}"
                        class="nav-link {{ request()->is('profile') ? 'active' : '' }}">
                        Профиль
                    </a>
                </li>
            </ul>
        @endif
        <div>
            <ul class="nav">
                <li class="w-100">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link class="nav-link" :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Выход
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <main>
        @yield('content')
    </main>
</body>

</html>