@extends('layouts.dashboard')
@section('title')
    Мои заказы
@endsection
@section('content')
    <section class="orders mb-0">
        <div class="row">
            <div class="col-12">
                <div class="title-div">
                    <h2 class="orders-info">Мои заказы</h2>
                </div>
            </div>
        </div>

        @if ($orders->isEmpty())
            <div class="info text-center ps-3">
                <p>У вас нет заказов</p>
            </div>
        @else
        @foreach ($orders as $order)
                <a href="{{ route('show-order', $order) }}">
                    <div class="row mb-4 mb-md-0">
                        <div class="info col-sm-12 col-md-4 ps-3">
                            <p>Заказ от {{ $formattedDates[$order->id] }}</p>
                        </div>
                        <div class="info col-sm-12 col-md-4 ps-3">
                            <p class="not-link">{{ $order->city_from }} - {{ $order->city_into }}</p>
                        </div>
                        <div class="info col-sm-12 col-md-4 ps-3">
                            <p class="not-link">{{ $order->status->name }}</p>
                        </div>
                    </div>
                </a>
        @endforeach
        @endif
    </section>
@endsection
