@extends('layouts.app')
@section('title') О компании@endsection
@section('description') Информация об экспедиторской транспортной компании &quot;УралПромАвто&quot;. Компания &quot;УралПромАвто&quot; осуществляет грузоперевозки по всей России и странам СНГ.@endsection
@section('content')
<!-- О нас -->
<section class="about" id="about">
    <div class="title-div">
        <h2 class="about__title">о нас</h2>
    </div>
    <div class="row">
        <div class="col">
            <p class="about__info info">УралПромАвто это</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="about__infos">
                <p class="about__info info">11 филиалов в городах России</p>
                <p class="about__info info">Екатеринбург, Москва, Санкт-Петербург, Омск, Челябинск, Тюмень, Сургут, Краснодар, Хабаровск, Севастополь, Новосибирск</p>
                <p class="about__info info">Головной офис находится в городе Курган</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <img src="/img/map.jpg" alt="Карта наших филиалов" class="about__img mx-auto d-block">
        </div>
    </div>
</section>

<!-- Наша команда -->
<section class="team" id="team">
    <div class="title-div">
        <h2>Наша команда</h2>
    </div>

    <div class="row g-0">
        <div class="col-sm-6 col-xl-3">
            <div class="team__card">
                <div class="team__div-img">
                    <img src="/img/team/team(1).jpg" alt="Генеральный директор - Юлия Александровна" class="team__img">
                </div>
                <div class="team__info">
                    <h4 class="team__info-title">Юлия Александровна</h4>
                    <p class="team__post">Генеральный директор</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="team__card">
                <div class="team__div-img">
                    <img src="/img/team/team(2).jpg" alt="Менеджер по логистике - Антон" class="team__img">
                </div>
                <div class="team__info">
                    <h4 class="team__info-title">Антон</h4>
                    <p class="team__post">Менеджер по логистике</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="team__card">
                <div class="team__div-img">
                    <img src="/img/team/team(3).jpg" alt="Менеджер по логистике - Дмитрий" class="team__img">
                </div>
                <div class="team__info">
                    <h4 class="team__info-title">Дмитрий</h4>
                    <p class="team__post">Менеджер по логистике</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="team__card">
                <div class="team__div-img">
                    <img src="/img/team/team(4).jpg" alt="Менеджер по логистике - Светлана" class="team__img">
                </div>
                <div class="team__info">
                    <h4 class="team__info-title">Светлана</h4>
                    <p class="team__post">Менеджер по логистике</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Письма -->
<section class="letters" id="letters">
    <div class="title-div">
        <h2 class="letters__title">Рекомендательные письма</h2>
    </div>
    <div class="row">
        <div class="col">
            <div class="carousel">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-touch="true" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 8"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8" aria-label="Slide 9"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9" aria-label="Slide 10"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="10" aria-label="Slide 11"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="11" aria-label="Slide 12"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="12" aria-label="Slide 13"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="13" aria-label="Slide 14"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="14" aria-label="Slide 15"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="15" aria-label="Slide 16"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="16" aria-label="Slide 17"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="17" aria-label="Slide 18"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/img/letters/letters(1).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(2).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(3).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(4).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(5).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(6).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(7).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(8).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(9).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(10).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(11).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(12).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(13).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(14).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(15).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(16).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(17).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/letters/letters(18).jpg" class="d-block mx-auto d-block" alt="Документ">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Предыдущий</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Следующий</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection