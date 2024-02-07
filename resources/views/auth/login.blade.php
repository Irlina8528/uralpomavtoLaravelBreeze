<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h1>Вход в Личный кабинет</h1>
        <!-- Адрес электронной почты  -->
        <div class="form-floating mb-3">
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Эл. почта" />
            <x-input-label for="email" :value="__('Эл. почта')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Пароль -->
        <div class="form-floating mb-3">
            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Пароль" />
            <a href="#" class="password-control "></a>
            <x-input-label for="password" :value="__('Пароль')" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <button type="submit" class="w-100 mb-2 btn-lg btn">
            {{ __('Войти') }}
        </button>

        <div class="d-flex justify-content-between">
            @if (Route::has('register'))
                <a class="link__reg" href="{{ route('register') }}">Регистрация</a>
            @endif

            <!-- Востановить пароль -->
            @if (Route::has('password.request'))
                <a class="link__reg" href="{{ route('password.request') }}">
                {{ __('Забыли пароль?') }}
                </a>
            @endif
        </div>
    </form>
    {{-- Скрыть/показать пароль --}}
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        $('body').on('click', '.password-control', function(){
          if ($('#password').attr('type') == 'password'){
            $(this).addClass('view');
            $('#password').attr('type', 'text');
          } else {
            $(this).removeClass('view');
            $('#password').attr('type', 'password');
          }
          return false;
        });
    </script>
</x-guest-layout>