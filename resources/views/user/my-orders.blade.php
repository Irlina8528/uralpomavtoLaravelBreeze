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

        @foreach ($orders as $order)
            <div class="row mb-4 mb-md-0">
                <div class="info col-sm-12 col-md-4 ps-3">
                    <a href="{{ route('show-order', $order) }}">Заказ от {{ $formattedDates[$order->id] }}</a>
                </div>
                <div class="info col-sm-12 col-md-4 ps-3">
                    <p>{{ $order->city_from }} - {{ $order->city_into }}</p>
                </div>
                <div class="info col-sm-12 col-md-4 ps-3">
                    <p>{{ $order->status->name }}</p>
                </div>
            </div>
        @endforeach

    </section>
@endsection
