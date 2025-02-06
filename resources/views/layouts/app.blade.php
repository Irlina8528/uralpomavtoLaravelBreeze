<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.head')

<body>
    <div class="container-fluid">
        <!-- Шапка -->
        <header class="is-fixed">
            <div class="wrapper">
                <nav class="navbar navbar-expand-lg justify-content-center ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="/img/logo.svg" alt="УралПромАвто" class="header__logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <a class="nav-link" href="{{ route('about') }}">О нас</a>
                            <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                            <a class="nav-link" href="{{ route('calculate-cost') }}">Рассчитать стоимость</a>
                        </div>
                        <div class="collapse navbar-collapse justify-content-end align-items-center"
                            id="navbarSupportedContent">
                            @if (Route::has('login'))
                                @auth
                                    @if(Auth::user()->id_usertype == 3)
                                        <x-responsive-nav-link class="nav-link" :href="route('administrator-users')" :active="request()->routeIs('orders')">
                                            Личный кабинет
                                        </x-responsive-nav-link>
                                    @elseif(Auth::user()->id_usertype == 2)
                                        <x-responsive-nav-link class="nav-link" :href="route('manager-orders')" :active="request()->routeIs('orders')">
                                            Личный кабинет
                                        </x-responsive-nav-link>
                                    @elseif(Auth::user()->id_usertype == 1)
                                        <x-responsive-nav-link class="nav-link" :href="route('orders')" :active="request()->routeIs('orders')">
                                            Личный кабинет
                                        </x-responsive-nav-link>
                                    @endif

                                    <!-- Выход -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link class="nav-link" :href="route('logout')"
                                            onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                            Выход
                                        </x-dropdown-link>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="nav-link">Личный кабинет</a>
                                @endauth
                            @endif
                        </div>

                    </div>
                </nav>
            </div>
        </header>

        <div class="wrapper">
            <!-- Основная часть -->
            <main>
                @yield('content')
            </main>

            <!-- Подвал -->
            <footer class="wow animate__fadeInUp">
                <ul class="nav justify-content-center mb-3 outline d-block d-md-flex">
                    <li class="nav-item"><a class="nav-link p-2 p-md-3" href="{{ route('about') }}">О нас</a></li>
                    <li class="nav-item"><a class="nav-link p-2 p-md-3" href="{{ route('contacts') }}">Контакты</a></li>
                    <li class="nav-item"><a class="nav-link p-2 p-md-3" href="{{ route('calculate-cost') }}">Рассчитать стоимость</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link p-2 p-md-3">Личный кабинет</a></li>
                </ul>
                <p class="text-center text-body-secondary">© 2024</p>
                <img src="/img/Gradient-b.png" alt="Градиент" class="gradient-b">
            </footer>
        </div>
    </div>
</body>

</html>
