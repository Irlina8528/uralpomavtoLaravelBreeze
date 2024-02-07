<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="form__guest">
        @csrf

        <h1>Регистрация</h1>
        <!-- Имя -->
        <div class="form-floating">
            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="given-name" placeholder="Имя"/>
            <x-input-label for="name" value="Имя" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Фамилия -->
        <div class="form-floating">
            <x-text-input id="surname" class="form-control" type="text" name="surname" :value="old('surname')" required autocomplete="family-name" placeholder="Фамилия" />
            <x-input-label for="surname" value="Фамилия" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="form-floating">
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="Эл. почта" />
            <x-input-label for="email" value="Эл. почта" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Пароль -->
        <div class="form-floating">
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Пароль" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" title="Минимальная длина пароля - 8 символов. Должен состоять из строчных и прописных букв, а так же цифр."/>
            <p class="info__guest">Минимальная длина пароля - 8 символов. Должен состоять из строчных и прописных букв, а так же цифр.</p>
            <a href="#" class="password-control "></a>
            <x-input-label for="password" value="Пароль" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        
        <!-- Подтвердите пароль -->
        <div class="form-floating">
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Подтвердите пароль" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*"/>
            <x-input-label for="password_confirmation" value="Подтвердите пароль" />
            <a href="#" class="password_confirmation-control"></a>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Чекбокс для отображения блока "Название компании" -->
        
        <input type="checkbox" id="show_company_name" class="block w-full btn-check">
        <label for="show_company_name" class="mb-1">Я юридическое лицо или ИП</label>
        <!-- Название компании -->
        <div class="form-floating mb-3" id="company_name_block">
            <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" autocomplete="organization" placeholder="Наименование компании" />
            <x-input-label for="company_name" value="Наименование компании" />
            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
        </div>

        <button type="submit" class="w-100 mb-2 mt-2 btn-lg btn">
            {{ __('Зарегистрироваться') }}
        </button>

        <a class="link__reg" href="{{ route('login') }}">
            {{ __('Вход в личный кабинет') }}
        </a>
    </form>

    {{-- Скрыть/показать пароль --}}
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        $('body').on('click', '.password-control', function(){
          if ($('#password').attr('type') == 'password'){
            $(this).addClass('view');
            $('#password').attr('type', 'text');
          } else {
            $(this).removeClass('view');
            $('#password').attr('type', 'password');
          }
          return false;
        });
      
        $('body').on('click', '.password_confirmation-control', function(){
          if ($('#password_confirmation').attr('type') == 'password'){
            $(this).addClass('view');
            $('#password_confirmation').attr('type', 'text');
          } else {
            $(this).removeClass('view');
            $('#password_confirmation').attr('type', 'password');
          }
          return false;
        });
    </script>
</x-guest-layout>