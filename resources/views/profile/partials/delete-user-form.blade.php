<section class="profile-del mb-0">
    <div class="title-div">
        <h2 class="profile-del__title">Удалить аккаунт</h2>
    </div>
    
    <p class="profile-del__info info">
        Как только ваша учетная запись будет удалена, все ее данные будут удалены безвозвратно.
    </p>

    <div class="profile-del__info info">
        <x-danger-button x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" data-bs-toggle="modal" data-bs-target="#modalDell">Удалить аккаунт</x-danger-button>
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
                                Введите свой пароль, чтобы подтвердить, что вы хотите удалить свою учетную запись безвозвратно.
                            </p>

                            <div class="form-floating mb-3">
                                <x-text-input id="password" name="password" type="password" placeholder="Пароль" />
                                <x-input-label for="password" value="Пароль" />
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>

                            <div class="mt-6 d-flex justify-content-between">
                                <x-danger-button> Удалить</x-danger-button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
{{-- Откытие модального окна если есть ошибки --}}
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    // Проверка наличия ошибок в поле пароля
    var passwordErrors = "{{ $errors->userDeletion->has('password') }}";

    if (passwordErrors) {
        $('#modalDell').modal('show');
    }
});

</script>