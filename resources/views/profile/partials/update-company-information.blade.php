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
                <x-text-input id="inn" name="inn" type="text" class="mt-1 block w-full" :value="old('inn', $user->inn)" required autofocus placeholder="ИНН" />
                <x-input-label for="inn" value="ИНН" />
                <x-input-error class="mt-2" :messages="$errors->get('inn')" />
            </div>

            <div class="form-floating col-sm-12 col-md-6">
                <x-text-input id="kpp" name="kpp" type="text" class="mt-1 block w-full" :value="old('kpp', $user->kpp)" placeholder="КПП" />
                <x-input-label for="kpp" value="КПП" />
                <x-input-error class="mt-2" :messages="$errors->get('kpp')" />
            </div>

            <div class="form-floating col-sm-12 col-md-6 pe-md-3">
                <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" :value="old('company_name', $user->company_name)" placeholder="Наименование компании" autocomplete="company_name" />
                <x-input-label for="company_name" value="Название компании" />
                <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
            </div>
            
            <div class="form-floating col-sm-12 col-md-6">
                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" placeholder="Адрес местонахождения" autocomplete="company_name" />
                <x-input-label for="address" value="Адрес местонахождения" />
                <x-input-error class="mt-2" :messages="$errors->get('address')" />
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