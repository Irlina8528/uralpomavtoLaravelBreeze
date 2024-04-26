@extends('layouts.dashboard')
@section('title')
    Пользователь
@endsection
@section('content')
    <section class="orders mb-0">
        {{-- Заголовок --}}
        <div class="row">
            <div class="col-12">
                <div class="title-div">
                    <h2 class="orders-info">{{ $user->name }} {{ $user->patronymic }} {{ $user->surname }}</h2>
                </div>
            </div>
        </div>
        {{-- Данные --}}
        <div class="row outline">
            @if ($user->phone)
                <div class="col-sm-12 col-md-auto">
                    <div class="info">
                        <p><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></p>
                    </div>
                </div>
            @endif
            <div class="col-sm-12 col-md-auto">
                <div class="info">
                    <p><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                </div>
            </div>
            @if ($user->address)
                <div class="col-sm-12 col-md-auto">
                    <div class="info">
                        <p>{{ $user->address }}</p>
                    </div>
                </div>
            @endif
            @if ($countOrder)
                <div class="col-sm-12 col-md-auto">
                    <div class="info">
                        <p>Количество заказов: {{ $countOrder }}</p>
                    </div>
                </div>
            @else
                    <div class="col-sm-12 col-md-auto">
                        <div class="info">
                            <p>Заказов нет</p>
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
