@extends('layouts.empty')

@section('content')
    <a href="{{ route('home') }}" class="link__guest">
        <img src="{{ asset('/img/logo.svg') }}" alt="" class="img__guest">  
    </a>
    {{ $slot }}
@endsection
