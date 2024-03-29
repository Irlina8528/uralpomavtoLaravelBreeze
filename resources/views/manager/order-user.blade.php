@extends('layouts.dashboard')
@section('title')
    Все заказы
@endsection
@section('content')
    <section class="orders mb-0">
        {{-- Заголовок --}}
        <div class="row">
            <div class="col-12">
                <div class="title-div">
                    <h2 class="orders-info">Пользователь - {{ $user->name }} {{ $user->patronymic }} {{ $user->surname }}
                    </h2>
                </div>
            </div>
        </div>
        {{-- Данные --}}
        <div class="row outline">
            @if ($user->phone)
                <div class="col-auto">
                    <div class="info">
                        <p>{{ $user->phone }}</p>
                    </div>
                </div>
            @endif
            <div class="col-auto">
                <div class="info">
                    <p>{{ $user->email }}</p>
                </div>
            </div>
            @if ($user->address)
                <div class="col-auto">
                    <div class="info">
                        <p>{{ $user->address }}</p>
                    </div>
                </div>
            @endif
        </div>

        {{-- Компания --}}
        @if ($user->id_company)
            <div class="row outline">
                <div class="col-12">
                    <div class="title-div align-items-center">
                        <h4 class="orders-info m-3">Данные компании</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                @if ($user->company->inn)
                <div class="col-auto">
                    <div class="info">
                        <p>Инн {{ $user->company->inn }}</p>
                    </div>
                </div>
                @endif
                @if ($user->company->kpp)
                    <div class="col-auto">
                        <div class="info">
                            <p>Кпп {{ $user->company->kpp }}</p>
                        </div>
                    </div>
                @endif
                @if ($user->company->address)
                <div class="col-auto">
                    <div class="info">
                        <p>Адрес {{ $user->company->address }}</p>
                    </div>
                </div>
                @endif
            </div>
        @endif
    </section>
@endsection
