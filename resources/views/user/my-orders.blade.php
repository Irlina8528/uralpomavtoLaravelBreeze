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
            <div class="row">
                <div class="info d-flex justify-content-between">
                    <a href="{{ route('show-order', $order) }}">Заказ от {{ $formattedDates[$order->id] }}</a>
                    <p>{{ $order->city_from }} - {{ $order->city_into }}</p>
                    <p>{{ $order->status->name }}</p>
                </div>
            </div>
        @endforeach

    </section>
@endsection
