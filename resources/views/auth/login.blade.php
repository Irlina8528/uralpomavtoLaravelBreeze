@section('title')
    Вход в личный кабинет
@endsection
<x-guest-layout>
    <!-- Статус -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h2 class="wow animate__fadeIn" data-wow-delay="1s">Вход в Личный кабинет</h2>
        <!-- Адрес электронной почты  -->
        <div class="form-floating mb-3">
            <x-text-input id="email" class="form-control  wow animate__fadeInLeft" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="email" placeholder="Эл. почта" />
            <x-input-label for="email" :value="__('Эл. почта')" data-wow-delay="0.8s" class="wow animate__fadeIn" data-wow-delay="0.8s" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Пароль -->
        <div class="form-floating mb-3">
            <x-text-input data-wow-delay="0.1s" id="password" class="form-control  wow animate__fadeInLeft" type="password" name="password" required
                autocomplete="current-password" placeholder="Пароль"
                pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*"
                title="Минимальная длина пароля - 8 символов. Должен состоять из строчных и прописных букв, а так же цифр." />
            <a href="#" class="password-control wow animate__fadeIn" data-wow-delay="1s"></a>
            <x-input-label for="password" :value="__('Пароль')" data-wow-delay="1s" class="wow animate__fadeIn"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <button type="submit" class="w-100 mb-2 btn-lg btn wow animate__fadeInUp" data-wow-delay="1s">
            {{ __('Войти') }}
        </button>

        <div class="d-flex justify-content-between wow animate__fadeInUp" data-wow-delay="1.2s">
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
</x-guest-layout>
