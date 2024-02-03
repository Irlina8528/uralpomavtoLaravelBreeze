<section class="profile-del">
    <div class="title-div">
        <h2 class="about__title">Удалить аккаунт</h2>
    </div>
    <p class="about__info">
        Как только ваша учетная запись будет удалена, все ее данные будут удалены безвозвратно.
    </p>

    <div class="about__info">
        <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" data-bs-toggle="modal" data-bs-target="#exampleModal">Удалить аккаунт</x-danger-button>
    </div>

    <!-- Модальное окно -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf
                            @method('delete')

                            <h2 class="">
                                Вы уверены, что хотите удалить свой аккаунт?
                            </h2>

                            <p class="application__info">
                                Введите свой пароль, чтобы подтвердить, что вы хотите удалить свою учетную запись безвозвратно.
                            </p>

                            <div class="form-floating mb-3">
                                <x-text-input id="password" name="password" type="password" placeholder="Пароль" />
                                <x-input-label for="password" value="Пароль" />

                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')" data-bs-dismiss="modal"> Отменить</x-secondary-button>
                                <x-danger-button> Удалить</x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>
    </div>
</section>