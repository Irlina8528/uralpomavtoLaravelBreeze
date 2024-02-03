<section class="profile-update">
        <div class="row">
            <div class="col-12 profile-update__img">
                <div class="row formi">
                <div class="offset-lg-2 col-lg-7 col-md-12 text-center">
            <p class="profile-update__info application__info"> Здесь вы можете обновить или добавить новые данные о себе</p>
        </div>
        <div class="row">
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    
        <div class="col-12 offset-md-3 col-md-6">
        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="form-floating mb-3">
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" placeholder="Имя"/>
            <x-input-label for="name" value="Имя" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="form-floating mb-3">
            <x-text-input id="patronymic" name="patronymic" type="text" class="mt-1 block w-full" :value="old('patronymic', $user->patronymic)" placeholder="Отчество"/>
            <x-input-label for="patronymic" value="Отчество" />
            <x-input-error class="mt-2" :messages="$errors->get('patronymic')" />
        </div>

        <div class="form-floating mb-3">
            <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', $user->surname)" required placeholder="Фамилия"/>
            <x-input-label for="surname" value="Фамилия" />
            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
        </div class="form-floating mb-3">

        <div class="form-floating mb-3">
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" placeholder="Телефон"/>
            <x-input-label for="phone" value="Телефон" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div class="form-floating mb-3">
    

        <div class="form-floating mb-3">
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" placeholder="Эл. почта"/>
            <x-input-label for="email" value="Эл. почта" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Чекбокс для отображения блока "Название компании" -->
        <input type="checkbox" id="show_company_name" class="block mt-1 w-full btn-check">
        <label for="show_company_name">Я юридическое лицо</label>
        <!-- Название компании -->
        <div class="form-floating mb-3" id="company_name_block">
            <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" :value="old('company_name', $user->company_name)" placeholder="Наименование компании" autocomplete="company_name" />
            <x-input-label for="company_name" value="Название компании" />
            <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="form__btn">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
                </div>
            </div>
        </div>
    </div>
</section>
