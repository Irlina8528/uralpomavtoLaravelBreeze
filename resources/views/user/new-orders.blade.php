@extends('layouts.dashboard')
@section('title')
    Новый заказ
@endsection
@section('content')
    <section class="orders-new mb-0" id="app">
        <div class="row">
            <div class="col-12">
                <div class="title-div">
                    <h2 class="orders-info">Новый заказ</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="map" class="map"></div>
            </div>
            <div id="viewContainer"></div>
            <new-order-component></new-order-component>
        </div>
    </section>
    <script
        src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=726c1f88-b5b9-42b0-9b20-c0e09c64e47b&suggest_apikey=48e4e7fc-f992-470f-9462-2807535ad255"
        type="text/javascript"></script>
@endsection
