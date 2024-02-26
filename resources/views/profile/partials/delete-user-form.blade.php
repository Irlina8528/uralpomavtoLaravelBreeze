<section class="profile-del mb-0">
    <div class="title-div">
        <h2 class="profile-del__title">Удалить аккаунт</h2>
    </div>
    
    <p class="profile-del__info info">
        Как только ваша учетная запись будет удалена, все ее данные будут удалены безвозвратно.
    </p>

    <div class="profile-del__info info ">
        <x-danger-button class="col-sm-12" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" data-bs-toggle="modal" data-bs-target="#modalDell">Удалить аккаунт</x-danger-button>
    </div>

    <!-- Модальное окно -->
    <div class="modal fade" id="modalDell" tabindex="-1" aria-labelledby="modalDell" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf
                            @method('delete')

                            <h2>
                                Вы уверены, что хотите удалить свой аккаунт?
                            </h2>

                            <p class="application__info">
                                Введите свой пароль, чтобы подтвердить, свои действия.
                            </p>

                            <div class="form-floating mb-3">
                                <x-text-input id="password" name="password" type="password" placeholder="Пароль" />
                                <a href="#" class="password-control "></a>
                                <x-input-label for="password" value="Пароль" />
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" id="passwordErrors" />
                            </div>

                            <div class="mt-6 d-flex justify-content-between">
                                <x-danger-button class="btn form__btn"> Удалить</x-danger-button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

