@extends('layouts.dashboard')
@section('title')
    Заказ от {{ $formattedDate }}
@endsection
@section('content')
    <section class="orders mb-0">
        <div class="row mb-md-5">
            <div class="col-12">
                <div class="title-div">
                    <h2 class="orders-info">Заказ от {{ $formattedDate }}</h2>
                </div>
            </div>
        </div>

        {{-- Прогресс --}}
        <div class="row d-none d-md-block">
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
                <button class="btn form__btn py-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProgress"
                    aria-expanded="false" aria-controls="collapseProgress">
                    {{ $order->status->name }}
                </button>

                <div class="collapse mb-4 mt-2" id="collapseProgress">
                    <div class="card card-body">
                        <ul class="list-group">
                            <li class="list-group-item {{ $order->status->name == 'Оформлен' ? 'active' : '' }}" aria-current="true">Оформлен</li>
                            <li class="list-group-item {{ $order->status->name == 'В работе' ? 'active' : '' }}">В работе</li>
                            <li class="list-group-item {{ $order->status->name == 'Ждёт оплаты' ? 'active' : '' }}">Ждёт оплаты</li>
                            <li class="list-group-item {{ $order->status->name == 'Оплачен' ? 'active' : '' }}">Оплачен</li>
                            <li class="list-group-item {{ $order->status->name == 'В пути' ? 'active' : '' }}">В пути</li>
                            <li class="list-group-item {{ $order->status->name == 'Доставлен' ? 'active' : '' }}">Доставлен</li>
                            <li class="list-group-item {{ $order->status->name == 'Завершен' ? 'active' : '' }}">Завершен</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="info mt-md-5">
                <p>Маршрут: {{ $order->city_from }} - {{ $order->city_into }}</p>
            </div>
        </div>

        <div class="row">
            {{-- Тип груза --}}
            @if ($order->liquid || $order->fragile || $order->loose || $order->dangerous)
                <div class="col-sm-12 @if (!$order->pallet && !$order->protective_packaging && !$order->carton) col-md-12 @else col-md-6 @endif  info">
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
                <div class="col-sm-12 @if (!$order->liquid && !$order->fragile && !$order->loose && !$order->dangerous) col-md-12 @else col-md-6 @endif  info">
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
                            <th>Длина</th>
                            <th>Ширина</th>
                            <th>Высота</th>
                            <th>Вес</th>
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
@endsection
