<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn mt-2']) }}>
    {{ $slot }}
</button>
