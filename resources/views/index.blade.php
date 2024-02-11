@extends('layouts.app')

@section('content')
    <!-- Анимация появления img -->
    <script>
        $(window).scroll(function() {
            $('.card__img').each(function() {
                var imagePos = $(this).offset().top;

                var topOfWindow = $(window).scrollTop();
                if (imagePos < topOfWindow + 700) {
                    $(this).addClass("expandUp");
                }
            });
        });
    </script>

    <!-- Анимаци блока как работаем -->
    <script>
        $(window).scroll(function() {
            $('.work__info').each(function() {
                var imagePos = $(this).offset().top;

                var topOfWindow = $(window).scrollTop();
                if (imagePos < topOfWindow + 900) {
                    $(this).addClass("pullUp");
                }
            });
        });
    </script>

    <!-- Анимаци о нас guarantees__info1-->
    <script>
        $(window).scroll(function() {
            $('.about__info').each(function() {
                var imagePos = $(this).offset().top;

                var topOfWindow = $(window).scrollTop();
                if (imagePos < topOfWindow + 900) {
                    $(this).addClass("pullDown");
                }
            });
        });
    </script>

    <!-- Главный экран -->
    <section class="intro">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <h1 class="intro__title">
                    ГРУЗОВЫЕ ПЕРЕВОЗКИ ПО РОССИИ И СТРАНАМ СНГ
                </h1>
            </div>
            <div class="row">
                <div class="d-grid gap-2 d-sm-block">
                    <a href="#application" class="btn intro__btn">Оформить заявку</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Услуги -->
    <section class="service" id="service">
        <div class="title-div">
            <h2 class="service__title">Услуги</h2>
        </div>

        <div class="row g-0">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="service__card cardi">
                    <div class="service__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/map.png" alt="Карта" class="service__img card__img">
                    </div>
                    <div class="service__info info__card">
                        <h3 class="service__info-title ">Перевозка грузов по России и странам СНГ</h3>
                        <p class="service__info-text card__text">Профессиональные грузоперевозки. Доставка грузов любой
                            сложности до 20-ти тонн</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="service__card cardi">
                    <div class="service__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/rocket.png" alt="" class="service__img card__img">
                    </div>
                    <div class="service__info info__card">
                        <h3 class="service__info-title">Перевозка техники и автомобилей</h3>
                        <p class="service__info-text card__text">Грузоперевозки автомобилей, различной спецтехники,
                            оборудования и других крупногабаритных грузов</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="service__card cardi">
                    <div class="service__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/dumbbell.png" alt="Гантеля" class="service__img card__img">
                    </div>
                    <div class="service__info info__card">
                        <h3 class="service__info-title">Перевозка негабаритного груза</h3>
                        <p class="service__info-text card__text">Большой опыт в перевозках негабаритного и
                            крупногабаритного груза</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="service__card cardi">
                    <div class="service__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/case.png" alt="Чемодан" class="service__img card__img">
                    </div>
                    <div class="service__info info__card">
                        <h3 class="service__info-title">домашние и офисные переезды</h3>
                        <p class="service__info-text card__text">Квартирные и офисные переезды из одного города в
                            другой, в другой регион или страну СНГ</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="service__card cardi">
                    <div class="service__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/godlet.png" alt="Бокал" class="service__img card__img">
                    </div>
                    <div class="service__info info__card">
                        <h3 class="service__info-title">Рефрижераторные грузоперевозки</h3>
                        <p class="service__info-text card__text">Перевозим продукты питания и другие грузы, для которых
                            необходимо соблюдение температурного режима</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="service__card cardi">
                    <div class="service__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/puzzle.png" alt="Пазл" class="service__img card__img">
                    </div>
                    <div class="service__info info__card">
                        <h3 class="service__info-title">Перевозка сборных грузов</h3>
                        <p class="service__info-text card__text">В одной машине мы перевозим грузы разных клиентов,
                            которые платят только за вес и объем своего товара</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Как работаем -->
    <section class="work" id="work">

        <div class="row">

            <div class="col-12">
                <div class="work__div-img">
                    <div class="work__infos">
                        <div class="work__info work__info1">
                            <h4 class="work__info-title">ДОСТАВЛЯЕМ</h4>
                            <p class="work__p">В труднодоступные места и месторождения</p>
                        </div>
                        <div class="work__info work__info2">
                            <h4 class="work__info-title">ОФОРМЛЯЕМ</h4>
                            <p class="work__p">Разрешения на перевозку негабаритного груза от 2-х дней</p>
                        </div>
                        <div class="work__info work__info3">
                            <h4 class="work__info-title">СОПРОВОЖДАЕМ</h4>
                            <p class="work__p">Осуществляем охрану груза и обеспечиваем сопровождение ГИБДД</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Преимущества -->
    <section class="benefits" id="benefits">

        <div class="title-div">
            <h2 class="benefits__title">Преимущества</h2>
        </div>

        <div class="row g-0">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="benefits__card cardi">
                    <div class="benefits__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/boxs.png" alt="Каробка" class="benefits__img card__img ">
                    </div>
                    <div class="benefits__info info__card">
                        <p class="benefits__info-text card__text">Перевозим все виды груза, опасные груза требующие
                            разрешения на перевозку, а так же любой негабаритный груз</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="benefits__card cardi">
                    <div class="benefits__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/star.png" alt="Звезда" class="benefits__img card__img">
                    </div>
                    <div class="benefits__info info__card">
                        <p class="benefits__info-text card__text">Надежная компания, работающая на рынке более 15 лет
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="benefits__card cardi">
                    <div class="benefits__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/calculator.png" alt="Калькулятор" class="benefits__img card__img ">
                    </div>
                    <div class="benefits__info info__card">
                        <p class="benefits__info-text card__text">Расчет стоимости доставки груза за 5 минут</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="benefits__card cardi">
                    <div class="benefits__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/protection.png" alt="Щит" class="benefits__img card__img ">
                    </div>
                    <div class="benefits__info info__card">
                        <p class="benefits__info-text card__text">Страхование Вашего груза до 35 000 000 рублей</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="benefits__card cardi">
                    <div class="benefits__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/map.png" alt="Карта" class="benefits__img card__img ">
                    </div>
                    <div class="benefits__info info__card">
                        <p class="benefits__info-text card__text">Возможность отслеживать груз онлайн GPS/ГЛОНАСС</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="benefits__card cardi">
                    <div class="benefits__div-img card__div-img d-flex justify-content-center">
                        <img src="/img/ico/like.png" alt="Класс" class="benefits__img card__img ">
                    </div>
                    <div class="benefits__info info__card">
                        <p class="benefits__info-text card__text">Доставка грузов "от двери до двери", без
                            промежуточных складов</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Гарантии -->
    <section class="guarantees" id="guarantees">

        <div class="title-div">
            <h2>Гарантии</h2>
        </div>
        <div class="row">
            <div>
                <div class="col-12">
                    <div class="guarantees__div-img">

                        <div class="row">
                            <div class="col-lg-5">
                                <div class="guarantees__info guarantees__info1">
                                    <h4 class="guarantees__info-title">Заключаем договор на перевозку груза</h4>
                                    <p class="guarantees__p">Договор гарантируют исполнение взятых на себя обязательств
                                        Исполнителя и Заказчика</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="offset-lg-3 col-lg-5">
                                <div class="guarantees__info guarantees__info2">
                                    <h4 class="guarantees__info-title">Застрахованная ответственность перевозчика на 35
                                        000 000 рублей</h4>
                                    <p class="guarantees__p">Данная страховка покрывает все риски, если виновником
                                        повреждения стала наша компания</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="offset-lg-6 col-lg-6">
                                <div class="guarantees__info guarantees__info3">
                                    <h4 class="guarantees__info-title">Гибкие индивидуальные условия работы</h4>
                                    <p class="guarantees__p">Мы работаем с любыми формами оплаты - без НДС / с НДС.
                                        Возможна отсрочка платежа. Своевременный документооборот
                                        - предоставляем все необходимые транспортные и отчетные
                                        бухгалтерские документы в срок</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Ответы на вопросы -->
    <section class="questions">

        <div class="title-div">
            <h2>Ответы на вопросы</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Как рассчитать стоимость отправки?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Вы можете рассчитать стоимость отправки любым из следующих
                                способов:
                                <ul>
                                    <li>С помощью <a href="{{ route('calculate-cost') }}">нашего калькулятора</a></li>
                                    <li>Позвонив или написав нашим консультантам: <a href="tel:+79828263448">+7 (982)
                                            826-34-48</a>, <a href="mailto:info@uralpromavto.ru">info@uralpromavto.ru</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Предоставляют ли ваши водители услуги грузчиков?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Это возможно за дополнительную оплату по договорённости с
                                самими водителями.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Каким типом транспорта вы доставляете груз?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Мы осуществляем перевозку груза авто транспортом.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                Как долго рассматривается заявка на перевозку груза?
                            </button>
                        </h2>
                        <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Срок рассмотрения заявки составляет от 1 до 3 дней.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                За какое время до даты отправки груза необходимо оформить заказ?
                            </button>
                        </h2>
                        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Оптимальным является срок в 1-2 дня до даты отправления, но в
                                некоторых случаях возможна срочная доставка грузов. Индивидуально уточнить ответ на этот
                                вопрос вы можете, связавшись с нашим оператором по тел.: <a href="tel:+79828263448">+7
                                    (982) 826-34-48</a>.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Заявка -->
    <section class="application" id="application">

        <div class="title-div">
            <h2>Остались вопросы?</h2>
        </div>
        <div class="row">
            <div>
                <div class="col-12 application__div-img">
                    <div class="row formi">
                        <div class="offset-lg-2 col-lg-8 col-md-12 text-center">
                            <p class="application__info">
                                Получите консультацию по вопросам логистических услуг. Мы свяжемся с вами в ближайшее
                                время.
                            </p>
                        </div>
                        <div class="row">
                            
                            <form>
                                <div class="col-12 offset-md-3 col-md-6 form-floating">
                                    <input id="name" type="text" class="form-control" placeholder="Имя/Организация" required>
                                    <label for="name">Имя/Организация</label>
                                </div>
                                <div class="col-12 offset-md-3 col-md-6 form-floating">
                                    <input id="phone" type="tel" class="form-control" placeholder="Телефон" required>
                                    <label for="phone">Телефон</label>
                                </div>
                                <div class="col-12 col-md-6 offset-md-3 form-floating">
                                    <textarea id="question" class="form-control textareai" id="exampleFormControlTextarea1" placeholder="Ваш вопрос"></textarea>
                                    <label for="question">Ваш вопрос</label>
                                </div>
                                <div class="col-12 col-md-6 offset-md-3">
                                    <button type="submit" class="btn form__btn">Получить консультацию</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
