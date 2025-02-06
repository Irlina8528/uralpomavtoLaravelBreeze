@props(['value'])

<label {{ $attributes->merge(['class' => 'wow animate__fadeIn'])  }} data-wow-delay="0.8s">
    {{ $value ?? $slot }}
</label>
