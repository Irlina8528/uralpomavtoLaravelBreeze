@extends('layouts.app')
@section('content')
    <section class="calc" id="app">
        <div class="title-div">
            <h2 class="service__title">РАССЧИТАЙТЕ СТОИМОСТЬ ГРУЗОПЕРЕВОЗКИ</h2>
        </div>
        <div class="row">
            <div class="col-12">
            <div id="map" class="map"></div>
	            
            </div>
            <div id="viewContainer"></div>
            <ymaps-component></ymaps-component>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="info">Указана ориентировочная стоимость. Оформите <a href="{{ route('user-orders') }}">заявку в личном кабинет</a>, чтобы получить более точный расчет.</p>
            </div>
        </div>
    </section>

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=726c1f88-b5b9-42b0-9b20-c0e09c64e47b&suggest_apikey=48e4e7fc-f992-470f-9462-2807535ad255" type="text/javascript"></script>
@endsection
