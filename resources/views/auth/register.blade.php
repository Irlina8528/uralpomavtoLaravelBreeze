@section('title')
    Регистрация
@endsection
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="form__guest">
        @csrf

        <h2 class="wow animate__fadeIn" data-wow-delay="1s">Регистрация</h2>
        <!-- Имя -->
        <div class="form-floating">
            <x-text-input id="name" class="form-control  wow animate__fadeInLeft" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="given-name" placeholder="Имя" />
            <x-input-label for="name" value="Имя" class="wow animate__fadeIn" data-wow-delay="0.8s" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Фамилия -->
        <div class="form-floating">
            <x-text-input id="surname" data-wow-delay="0.1s" class="form-control  wow animate__fadeInLeft" type="text" name="surname" :value="old('surname')" required
                autocomplete="family-name" placeholder="Фамилия" />
            <x-input-label for="surname" value="Фамилия" class="wow animate__fadeIn" data-wow-delay="1s" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="form-floating">
            <x-text-input id="email" data-wow-delay="0.2s" class="block mt-1 w-full  wow animate__fadeInLeft" type="email" name="email" :value="old('email')"
                required autocomplete="email" placeholder="Эл. почта" />
            <x-input-label for="email" value="Эл. почта" class="wow animate__fadeIn" data-wow-delay="1.2s" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Пароль -->
        <div class="form-floating">
            <x-text-input id="password" data-wow-delay="0.3s" class="block mt-1 w-full  wow animate__fadeInLeft" type="password" name="password" required
                autocomplete="new-password" placeholder="Пароль"
                pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*"
                title="Минимальная длина пароля - 8 символов. Должен состоять из строчных и прописных букв, а так же цифр." />
            <p class="info__guest">Минимальная длина пароля - 8 символов. Должен состоять из строчных и прописных букв,
                а так же цифр.</p>
            <a href="#" class="password-control wow animate__fadeIn" data-wow-delay="1s"></a>
            <x-input-label for="password" value="Пароль" class="wow animate__fadeIn" data-wow-delay="1.4s" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Подтвердите пароль -->
        <div class="form-floating">
            <x-text-input id="password_confirmation" data-wow-delay="0.4s" class="block mt-1 w-full  wow animate__fadeInLeft" type="password"
                name="password_confirmation" required autocomplete="new-password" placeholder="Подтвердите пароль"
                pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" />
            <x-input-label for="password_confirmation" value="Подтвердите пароль" class="wow animate__fadeIn" data-wow-delay="1.6s" />
            <a href="#" class="password-control wow animate__fadeIn" data-wow-delay="1s"></a>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Чекбокс для отображения блока "Название компании" -->

        <input type="checkbox" id="show_company_name" class="block w-full btn-check">
        <label for="show_company_name" class="mb-1 wow animate__fadeInUp" data-wow-delay="1s">Я юридическое лицо или ИП</label>
        <!-- Название компании -->
        <div class="form-floating mb-3" id="company_name_block">
            <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                :value="old('company_name')" autocomplete="organization" placeholder="Наименование компании" />
            <x-input-label for="company_name" value="Наименование компании" />
            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
        </div>

        <button type="submit" class="w-100 mb-2 mt-2 btn-lg btn wow animate__fadeInUp" data-wow-delay="0.5s">
            {{ __('Зарегистрироваться') }}
        </button>

        <a class="link__reg wow animate__fadeInUp" href="{{ route('login') }}" data-wow-delay="0.7s">
            {{ __('Вход в личный кабинет') }}
        </a>
    </form>
</x-guest-layout>
