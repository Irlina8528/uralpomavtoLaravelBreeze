@section('title')Подтверждение пароля@endsection
<x-guest-layout>
    <form method="POST" action="{{ route('password.confirm') }}" class="form__guest">
        @csrf
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Это защищенная область приложения. Пожалуйста, подтвердите свой пароль, прежде чем продолжить.
        </div>
        <!-- Пароль -->
        <div class="form-floating mb-3">
            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Пароль" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" />
            <a href="#" class="password-control "></a>
            <x-input-label for="password" :value="__('Пароль')" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button class="w-100 btn">Подтвердить</x-primary-button>
        </div>
    </form>
</x-guest-layout>
