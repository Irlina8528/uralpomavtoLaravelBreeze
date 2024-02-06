<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.head')
<body>
    <main class="d-flex flex-nowrap ">
        <div class="col-auto col-md-3 col-xl-2 ">
            <div class="d-flex flex-column align-items-center align-items-sm-start text-white col-auto col-md-3 col-xl-2 Offcanvas">
                <a href="{{ route('home') }}" class="w-100 nav-link text-white">
                    На главную
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
                    <li class="w-100">
                        <a href="{{ route('profile-orders') }}" class="nav-link {{ request()->is('profile-orders') ? 'active' : 'text-white'}}">
                            Мои заказы
                        </a>
                    </li>
                    <li class="w-100">
                        <a href="#" class="nav-link text-white">
                            Поддержка
                        </a>
                    </li>
                    <li class="w-100">
                        <a href="{{ route('profile.update') }}" class="nav-link {{ request()->is('profile') ? 'active' : 'text-white'}}">
                            Настройка
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="pb-4">
                    <ul class="nav">
                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Выход
                            </x-dropdown-link>
                        </form>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
        @yield('content')
        </div>
    </main>
</body>

</html>