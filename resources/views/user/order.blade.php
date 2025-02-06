@extends('layouts.dashboard')
@section('title')
    Заказ от {{ $formattedDate }}
@endsection
@section('content')
    <section class="orders mb-0">
        <div class="row align-items-center outline">
            <div class="col-2">
                <button class="btn p-1" onclick="history.back()">❮</button>
            </div>
            <div class="col-9 offset-0 col-md-6 offset-md-1 d-flex align-items-center justify-content-center">
                <h2 class="orders-info">Заказ от {{ $formattedDate }}</h2>
            </div>
        </div>

        @if($order->status->id == 8)
            <div class="info">
                <p>Заказ отменен. Причина: {{ $order->reason }}</p>
            </div>
        @else
            {{-- Прогресс --}}
            <div class="row mt-md-5 mb-md-5 d-none d-md-block">
                <div class="col-11">
                    <div class="position-relative">
                        <div class="progress">
                            <div class="one {{ $progress >= 2 ? 'color-accent' : 'no-color' }}">
                                <p class="p-status">Оформлен</p>
                            </div>
                            <div class="two {{ $progress >= 16 ? 'color-accent' : 'no-color' }}">
                                <p class="p-status">В работе</p>
                            </div>
                            <div class="three {{ $progress >= 35 ? 'color-accent' : 'no-color' }}">
                                <p class="p-status">Ждёт оплаты</p>
                            </div>
                            <div class="four {{ $progress >= 45 ? 'color-accent' : 'no-color' }}">
                                <p class="p-status">Оплачен</p>
                            </div>
                            <div class="five {{ $progress >= 66 ? 'color-accent' : 'no-color' }}">
                                <p class="p-status">В пути</p>
                            </div>
                            <div class="six {{ $progress >= 86 ? 'color-accent' : 'no-color' }}">
                                <p class="p-status">Доставлен</p>
                            </div>
                            <div class="seven {{ $progress >= 100 ? 'color-accent' : 'no-color' }}">
                                <p class="p-status">Завершен</p>
                            </div>
                            <div class="progress-bar" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Прогресс см --}}
            <div class="row d-block d-md-none">
                <div class="col-12">
                    <button class="btn form__btn py-1" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseProgress"
                            aria-expanded="false" aria-controls="collapseProgress">
                        {{ $order->status->name }}
                    </button>

                    <div class="collapse mb-4 mt-2" id="collapseProgress">
                        <div class="card card-body">
                            <ul class="list-group">
                                <li class="list-group-item {{ $order->status->name == 'Оформлен' ? 'active' : '' }}"
                                    aria-current="true">Оформлен
                                </li>
                                <li class="list-group-item {{ $order->status->name == 'В работе' ? 'active' : '' }}">В
                                    работе
                                </li>
                                <li class="list-group-item {{ $order->status->name == 'Ждёт оплаты' ? 'active' : '' }}">
                                    Ждёт оплаты
                                </li>
                                <li class="list-group-item {{ $order->status->name == 'Оплачен' ? 'active' : '' }}">
                                    Оплачен
                                </li>
                                <li class="list-group-item {{ $order->status->name == 'В пути' ? 'active' : '' }}">В
                                    пути
                                </li>
                                <li class="list-group-item {{ $order->status->name == 'Доставлен' ? 'active' : '' }}">
                                    Доставлен
                                </li>
                                <li class="list-group-item {{ $order->status->name == 'Завершен' ? 'active' : '' }}">
                                    Завершен
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="info">
                <p>Маршрут: {{ $order->city_from }} - {{ $order->city_into }}</p>
            </div>
        </div>
        <div class="row">
            {{-- Тип груза --}}
            @if ($order->liquid || $order->fragile || $order->loose || $order->dangerous)
                <div
                    class="col-sm-12 @if (!$order->pallet && !$order->protective_packaging && !$order->carton) col-md-12 @else col-md-6 @endif  info">
                    <p>Тип груза:</p>
                    <ul>
                        @if ($order->liquid)
                            <li>Жидкий</li>
                        @endif
                        @if ($order->fragile)
                            <li>Хрупкий</li>
                        @endif
                        @if ($order->loose)
                            <li>Сыпучий</li>
                        @endif
                        @if ($order->dangerous)
                            <li>Опасный</li>
                        @endif
                    </ul>
                </div>
            @endif

            {{-- Упаковка --}}
            @if ($order->pallet || $order->protective_packaging || $order->carton)
                <div
                    class="col-sm-12 @if (!$order->liquid && !$order->fragile && !$order->loose && !$order->dangerous) col-md-12 @else col-md-6 @endif  info">
                    <p>Упаковка:</p>
                    <ul>
                        @if ($order->pallet)
                            <li>Груз на поддоне</li>
                        @endif
                        @if ($order->protective_packaging)
                            <li>Защитная транспортировочная упаковка</li>
                        @endif
                        @if ($order->carton)
                            <li>Картонная коробка</li>
                        @endif
                    </ul>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="info">
                <p>Объявленная стоимость: {{ $order->declared_cost }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="title-div align-items-center">
                    <h4 class="orders-info m-3">Груз</h4>
                </div>
            </div>
        </div>

        {{-- Грузы --}}
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered tb m-0">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Длина, м</th>
                        <th>Ширина, м</th>
                        <th>Высота, м</th>
                        <th>Вес, кг</th>
                        <th>Количество</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->cargo as $index => $cargo)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $cargo->length }}</td>
                            <td>{{ $cargo->width }}</td>
                            <td>{{ $cargo->height }}</td>
                            <td>{{ $cargo->weight }}</td>
                            <td>{{ $cargo->quantity }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="info d-flex justify-content-end">
                <p>Итоговая стоимость: <span class="title-cost">{{ $order->cost }}</span></p>
            </div>
        </div>
    </section>

    @if($order->status->name == 'Завершен' )
        @if (!$order->OrderFeedback)
            <section class="mb-0" id="app">
                <div class="row">
                    <div class="col-12">
                        <div class="title-div d-flex justify-content-center">
                            <h4 class="orders-info m-3 me-5 ">Оставьте отзыв о нашей работе</h4>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#feedback"
                                    class="btn col-sm-12 col-md-3 p-1">Написать отзыв
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="modal fade" id="feedback" data-bs-keyboard="false" tabindex="-1"
                         aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Оцените качество услуги</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Закрыть"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('user-feedback')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_order" value="{{$order->id }}">
                                        <div class="">
                                            <div class="rate">
                                                <input type="radio" id="star5" name="rating" value="5"/>
                                                <label for="star5"></label>
                                                <input type="radio" id="star4" name="rating" value="4"/>
                                                <label for="star4"></label>
                                                <input type="radio" id="star3" name="rating" value="3"/>
                                                <label for="star3"></label>
                                                <input type="radio" id="star2" name="rating" value="2"/>
                                                <label for="star2"></label>
                                                <input type="radio" id="star1" name="rating" value="1"/>
                                                <label for="star1"></label>
                                            </div>
                                        </div>


                                        <div class="form-floating mt-3">
                                            <textarea class="form-control" placeholder="Комментарий" name="comment"
                                                      id="comment" required></textarea>
                                            <label for="comment">Комментарий</label>
                                        </div>

                                        <button class="btn form__btn p-3" type="submit">Отправить</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            @if(session('message'))
                <div class="info text-center">
                    {{ session('message') }}
                </div>
            @else
                <div class="info d-flex justify-content-end">
                    <p>Вы уже поставили оценку</p>
                </div>
            @endif
        @endif
    @endif

    <script
        src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=726c1f88-b5b9-42b0-9b20-c0e09c64e47b&suggest_apikey=48e4e7fc-f992-470f-9462-2807535ad255"
        type="text/javascript"></script>
@endsection
