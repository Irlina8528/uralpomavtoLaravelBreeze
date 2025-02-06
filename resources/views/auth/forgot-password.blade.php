@section('title')Сброс пароля@endsection
<x-guest-layout>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h2 class="wow animate__fadeIn" data-wow-delay="1s">Забыли пароль?</h2>
        <p class="wow animate__fadeIn" data-wow-delay="1.2s">
            Код для восстановления будет отправлен вам на почту.
        </p>
        <!-- Почта -->
        <div class="form-floating mb-3">
            <x-text-input id="email" class="block mt-1 w-full  wow animate__fadeInLeft" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Эл. почта"/>
            <x-input-label for="email" value="Эл. почта" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Статус -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <button type="submit" class="w-100 mb-2 btn-lg btn wow animate__fadeInUp" data-wow-delay="0.5s">
            {{ __('Отправить') }}
        </button>
    </form>
</x-guest-layout>
