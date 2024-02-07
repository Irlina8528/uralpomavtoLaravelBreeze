<section class="company-info">
    <div class="row">
        <div class="col-12">
            <div class="title-div">
                <h2 class="company-info">Данные о компании</h2>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form> --}}
        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div class="row">
            <div class="form-floating col-sm-12 col-md-6 pe-md-3">
                <x-text-input id="company_inn" name="company_inn" type="text" :value="old('company_inn', $user->company_inn)" required pattern="[0-9-]{10,12}" title="Введите корректный ИНН" autofocus placeholder="ИНН" />
                <x-input-label for="company_inn" value="ИНН" />
                <x-input-error class="mt-2" :messages="$errors->get('company_inn')" />
            </div>

            <div class="form-floating col-sm-12 col-md-6">
                <x-text-input id="company_kpp" name="company_kpp" type="text" :value="old('company_kpp', $user->company_kpp)" pattern="[0-9-]{9}" title="Введите корректный КПП" placeholder="КПП" />
                <x-input-label for="company_kpp" value="КПП" />
                <x-input-error class="mt-2" :messages="$errors->get('company_kpp')" />
            </div>

            <div class="form-floating col-sm-12 col-md-6 pe-md-3">
                <x-text-input id="company_name" name="company_name" type="text" :value="old('company_name', $user->company_name)" required placeholder="Наименование компании" autocomplete="company_name" />
                <x-input-label for="company_name" value="Название компании" />
                <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
            </div>
            
            <div class="form-floating col-sm-12 col-md-6">
                <x-text-input id="company_address" name="company_address" type="text" :value="old('company_address', $user->company_address)" required placeholder="Адрес местонахождения" autocomplete="company_name" />
                <x-input-label for="company_address" value="Адрес местонахождения" />
                <x-input-error class="mt-2" :messages="$errors->get('company_address')" />
            </div>


            <div>
                <x-primary-button class="form__btn">Сохранить</x-primary-button>

                @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">Данные сохранены</p>
                @endif
            </div>
            </div>
        </form>
    </div>
</section>