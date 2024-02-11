<x-guest-layout>
    <h2>
    Подтвердите электронную почту
    </h2>
    <p>
        Проверьте почту, или отправьте новое письмо 
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
</x-guest-layout>
