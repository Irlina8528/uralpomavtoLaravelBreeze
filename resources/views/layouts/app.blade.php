<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="/img/Star-w.jpg" type="image/x-icon">
        <!-- Scripts -->
        @vite(['resources/js/app.js', 'resources/js/bootstrap.min.js', 'resources/js/ymaps.js', ])
    </head>
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
                        <a href="#application" class="btn header__btn" data-bs-toggle="modal" data-bs-target="#signInModal">Личный кабинет</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                              </button>
                              
                            @if (Route::has('login'))
                                @auth
                                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                    @endif
                                @endauth
                            @endif

                    </div>
                </nav>
            </div>
        </header>
        
        <!-- Модальное окно -->
        <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <h4 class="modal__title">Вход в Личный кабинет</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-5 pt-0">
                        <form class="">
                            <div class="mb-3">
                                <input type="text" class="form-control rounded-3 input__modal"
                                    placeholder="Email или номер телефона">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control rounded-3 input__modal" placeholder="Пароль">
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3" type="submit">Войти</button>
                            <a href="">Регистрация</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
                            <a href="#application" class="btn form__btn">ОТПРАВИТЬ ЗАЯВКУ</a>
                        </div>
                        <div class="col-12 col-md-3"></div>
                    </div>
                </div>
                <img src="/img/Gradient-b.png" alt="Градиент" class="gradient-b">
            </footer>
        </div>
        </div>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
    </body>
</html>