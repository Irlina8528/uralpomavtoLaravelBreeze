@extends('layouts.empty')

@section('content')
    <a href="{{ route('home') }}" class="link__guest wow animate__fadeIn" data-wow-delay="1.2s">
        <img src="{{ asset('/img/logo.svg') }}" alt="" class="img__guest">
    </a>
    {{ $slot }}
@endsection
