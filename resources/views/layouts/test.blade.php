<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="shortcut icon" href="/img/Star-w.jpg" type="image/x-icon">

    <link rel="stylesheet" href="/css/animations.css">
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <title>УралПромАвто</title>
    
    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/js/bootstrap.min.js', ])
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
                        <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))

                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                            @endif

                            @if (Route::has('register'))

                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
       
                            @endif
                        @else

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                        @endguest

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

            {{-- Подвал --}}
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
</body>

</html>
