<section>
    <div class="row">
        <div class="col-12">
            <div class="title-div">
                <h2 class="company-info">Сменить пароль</h2>
            </div>
        </div>
    </div>
  
    <div class="row">
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
    
            <div class="row">
                <div class="form-floating col-12">
                    <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" placeholder="Текущий пароль"/>
                    <x-input-label for="update_password_current_password" value="Текущий пароль" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>
        
                <div class="form-floating col-sm-12 col-md-6 pe-md-3">
                    <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" placeholder="Новый пароль"/>
                    <x-input-label for="update_password_password" :value="__('Новый пароль')" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>
        
                <div class="form-floating col-sm-12 col-md-6">
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" placeholder="Подтвердите пароль"/>
                    <x-input-label for="update_password_password_confirmation" value="Подтвердите пароль" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div>
                    <x-primary-button class="form__btn">Сохранить</x-primary-button>
        
                    @if (session('status') === 'password-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </form>
    </div>
</section>
