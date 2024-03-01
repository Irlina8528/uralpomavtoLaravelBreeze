<section class="company-info">
    <div class="row">
        <div class="col-12">
            <div class="title-div">
                <h2 class="company-info">Данные о компании или ИП</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <form method="post" action="{{ route('profile.company_update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div class="row">
                <div class="form-floating col-sm-12 col-md-6 pe-md-3">
                    <x-text-input id="inn" name="inn" type="text" :value="old('inn', $user->company->inn)" required
                        pattern="^(\d{2}-){4}(\d{2}-)?\d{2}$" title="Введите корректный ИНН" autofocus
                        placeholder="ИНН" />
                    <x-input-label for="inn" value="ИНН" />
                    <x-input-error class="mt-2" :messages="$errors->get('inn')" />
                </div>

                <div class="form-floating col-sm-12 col-md-6">
                    <x-text-input id="kpp" name="kpp" type="text" :value="old('kpp', $user->company->kpp)"
                        pattern="^\d{3}-\d{3}-\d{3}$" title="Введите корректный КПП" placeholder="КПП" />
                    <x-input-label for="kpp" value="КПП" />
                    <x-input-error class="mt-2" :messages="$errors->get('kpp')" />
                </div>

                <div class="form-floating col-sm-12 col-md-6 pe-md-3">
                    <x-text-input id="company_name" name="name" type="text" :value="old('name', $user->company->name)" required
                        placeholder="Наименование компании" autocomplete="company_name" />
                    <x-input-label for="name" value="Название компании" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="form-floating col-sm-12 col-md-6">
                    <x-text-input id="company_address" name="address" type="text" :value="old('address', $user->company->address)" required
                        placeholder="Адрес местонахождения" autocomplete="company_name" />
                    <x-input-label for="address" value="Адрес местонахождения" />
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                </div>


                <div>
                    <x-primary-button class="form__btn">Сохранить</x-primary-button>

                    @if (session('status') === 'profile-company-update')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">Данные сохранены</p>
                    @endif
                </div>
            </div>
        </form>
    </div>
</section>
