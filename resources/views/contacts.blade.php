@extends('layouts.app')
@section('content')
    <section class="contact-map">
        <div class="title-div">
            <h2 class="aboutus__title">Где нас найти</h2>
        </div>

        <div class="row">
            <div class="col-12">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A146c03a87fd44dafbdfcb589801958f4eef85ffefdf42cb6730f01a9a995604f&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
            </div>
        </div>
    </section>

    <section class="aboutus">
      <div class="title-div">
        <h2 class="aboutus__title">Как связаться с нами</h2>
      </div>

        <div class="row g-0">
            <div class="col-sm-12 col-md-4">
                <div class="aboutus__card cardi">
                    <div class="aboutus__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/map.png" alt="Карта" class="about__img card__img">
                    </div>
                    <div class="aboutus__info info__card">
                        <h3 class="aboutus__info-title">г. Курган, 2 мкр, д. 9</h3>
                        <p class="aboutus__info-text card__text">Наш офис</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="aboutus__card cardi">
                    <div class="aboutus__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/tel.png" alt="Карта" class="about__img card__img">
                    </div>
                    <div class="aboutus__info info__card">
                        <h3 class="aboutus__info-title"><a href="tel:+79828263448">+7 (982) 826-34-48</a></h3>
                        <p class="aboutus__info-text card__text">Наши менеджеры проконсультирую вас и предложат лучший
                            вариант</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="aboutus__card cardi">
                    <div class="aboutus__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/mail.png" alt="Карта" class="about__img card__img">
                    </div>
                    <div class="aboutus__info info__card">
                        <h3 class="aboutus__info-title"><a href="mailto:info@uralpromavto.ru">info@uralpromavto.ru</a></h3>
                        <p class="aboutus__info-text card__text">Вы можете связаться с нами по электронной почте</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
