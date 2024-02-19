@section('title')Подтверждения почты@endsection
<x-guest-layout>
    <div class="mw-700">
        <h2>
    Подтвердите электронную почту
    </h2>
    <p>
        На адрес электронной почты, указанный при регистрации, была отправлена ссылка для активации. Если письмо не пришло, нажмите на кнопку ниже для повторной отправки.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
        На вашу электронную почту была отправлена новая ссылка для подтверждения.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="col-12">
                    Отправить
                </x-primary-button>
            </div>
        </form>
    </div>
    </div>
</x-guest-layout>
