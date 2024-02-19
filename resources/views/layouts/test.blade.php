<main class="d-flex flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
            <a href="{{ route('profile.update') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                {{ Auth::user()->name }} {{ Auth::user()->surname }}
            </a>

            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="{{ route('profile-orders') }}" class="nav-link {{ request()->is('profile-orders') ? 'active' : 'text-white'}}">
                        Заказы
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        Поддержка
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.update') }}" class="nav-link {{ request()->is('profile') ? 'active' : 'text-white'}}">
                        Настройка
                    </a>
                </li>
            </ul>
            <hr>
            <div>
                <ul>
                    <li><a href="{{ route('home') }}">Вернуться на главную</a></li>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Выход
                        </x-dropdown-link>
                    </form>
                </ul>
            </div>
        </div>
        @yield('content')
    </main>