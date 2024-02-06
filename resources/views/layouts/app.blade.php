<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.head')
    <body>
        <div class="container-fluid">
        <!-- Шапка -->
        <header class="is-fixed ">
            <div class="wrapper">
                <nav class="navbar navbar-expand-lg justify-content-center ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="/img/logo.svg" alt="УралПромАвто" class="header__logo">
                        </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <a class="nav-link" href="{{ route('about') }}">О нас</a>
                            <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                            <a class="nav-link" href="{{ route('calculate-cost') }}">Рассчитать стоимость</a>
                        </div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                              </button>
                              
                            @if (Route::has('login'))
                                @auth
                                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                            Личный кабинет
                                        </x-responsive-nav-link>

                                        <!-- Выход -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                Выход
                                            </x-dropdown-link>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="px-4">Личный кабинет</a>

                                    <!-- @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                    @endif -->
                                @endauth
                            @endif

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
            <footer>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <a href="tel:+73522611163" class="footer__link">+7(3522)61-11-63</a>
                            <p>
                                <a href="tel:+79080066900" class="footer__link">+7-908-006-69-00</a>
                            </p>
                        </div>
                        <div class="col-12 col-md-4 offset-md-1">
                            <a href="#application" class="btn footer__link">ОТПРАВИТЬ ЗАЯВКУ</a>
                        </div>
                        <div class="col-12 col-md-3"></div>
                    </div>
                </div>
                <img src="/img/Gradient-b.png" alt="Градиент" class="gradient-b">
            </footer>
        </div>
        </div>
            <!-- Page Heading -->
            <!-- @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif -->
    </body>
</html>
