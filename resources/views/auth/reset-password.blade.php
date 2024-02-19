@section('title')Сброс пароля@endsection
<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="form__guest">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="form-floating">
            <x-text-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus placeholder="Эл. почта" autocomplete="username" />
            <x-input-label for="email" value="Эл. почта" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-floating">
            <x-text-input id="password" class="form-control" type="password" name="password" placeholder="Пароль" required autocomplete="new-password" />
            <x-input-label for="password"  value="Пароль"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-floating">
            <x-text-input id="password_confirmation" placeholder="Подтвердите пароль" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-label for="password_confirmation" value="Подтвердите пароль" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        
            <x-primary-button class="w-100 mb-2 mt-2 btn-lg btn">
            Сбросить пароль
            </x-primary-button>
        
    </form>
</x-guest-layout>
