<section class="profile-update ">
    <div class="row">
        <div class="col-12">
            <div class="title-div">
                <h2>Личные данные</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div class="row">
            <div class="form-floating col-sm-12 col-md-6 pe-md-3  col-lg-4">
                <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" placeholder="Имя" />
                <x-input-label for="name" value="Имя" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="form-floating col-sm-12 col-md-6  col-lg-4 pe-lg-3">
                <x-text-input id="patronymic" name="patronymic" type="text" :value="old('patronymic', $user->patronymic)" placeholder="Отчество" autocomplete="additional-name"/>
                <x-input-label for="patronymic" value="Отчество" />
                <x-input-error class="mt-2" :messages="$errors->get('patronymic')" />
            </div>

            <div class="form-floating col-sm-12 col-md-6 pe-md-3  col-lg-4 pe-lg-0">
                <x-text-input id="surname" name="surname" type="text" :value="old('surname', $user->surname)" required placeholder="Фамилия" autocomplete="family-name"/>
                <x-input-label for="surname" value="Фамилия" />
                <x-input-error class="mt-2" :messages="$errors->get('surname')" />
            </div class="form-floating mb-3">

            <div class="form-floating col-sm-12 col-md-6  col-lg-4 pe-lg-3">
                <x-text-input id="passport_series" name="passport_series" type="text" :value="old('passport_series', decrypt($user->passport_series))" required  pattern="[0-9]{4}" title="Введите корректные данные паспорта" placeholder="Серия паспорта" />
                <x-input-label for="passport_series" value="Серия паспорта" />
                <x-input-error class="mt-2" :messages="$errors->get('passport_series')" />
            </div class="form-floating mb-3">

            <div class="form-floating col-sm-12 col-md-6 pe-md-3  col-lg-4">
                <x-text-input id="passport_number" name="passport_number" type="text" :value="old('passport_number', decrypt($user->passport_number))" required  pattern="[0-9]{6}" title="Введите корректные данные паспорта" placeholder="Номер паспорта" />
                <x-input-label for="passport_number" value="Номер паспорта" />
                <x-input-error class="mt-2" :messages="$errors->get('passport_number')" />
            </div class="form-floating mb-3">

            <div class="form-floating col-sm-12 col-md-6  col-lg-4">
                <x-text-input id="address" name="address" type="text" :value="old('address', $user->address)" placeholder="Адрес" autocomplete="address-line1"/>
                <x-input-label for="address" value="Адрес" />
                <x-input-error class="mt-2" :messages="$errors->get('address')" />
            </div class="form-floating mb-3">

            <div class="form-floating col-sm-12 col-md-6 pe-md-3  col-lg-4">
                <x-text-input id="phone" class="mb-md-0" name="phone" type="text" :value="old('phone', $user->phone)" placeholder="Телефон" autocomplete="tel" pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$" title="Введите корректный номер телефона"/>
                <x-input-label for="phone" value="Телефон" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div class="form-floating mb-3">


            <div class="form-floating col-sm-12 col-md-6  col-lg-4 pe-lg-3">
                <x-text-input id="email" class="mb-md-0" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" placeholder="Эл. почта" />
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

                <div class="col-sm-12 mt-md-3  col-lg-4 mt-lg-0">
                    <x-primary-button class="form__btn profile__btn">Сохранить</x-primary-button>
                </div>
                

                @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">Данные сохранены</p>
                @endif
            </div>
        </form>
    </div>

    </div>
</section>