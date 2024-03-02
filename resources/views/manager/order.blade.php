@extends('layouts.dashboard')
@section('title')
    Заказ {{ $order->id }}
@endsection
@section('content')
    <section class="orders mb-0">
        <div class="row">
            <div class="col-12">
                <div class="title-div">
                    <h2 class="orders-info">Заказ {{ $order->id }} от {{ $formattedDate }}</h2>
                </div>
            </div>
        </div>

        {{-- Маршрут Пользователь Статус --}}
        <div class="row">
            <div class="d-flex justify-content-between outline">
                <div class="d-flex">
                    <div class="info">
                        <p>Маршрут: {{ $order->city_from }} - {{ $order->city_into }}</p>
                    </div>
                    <div class="info">
                        <a href="{{ route('manager-order-user', $order->user->id) }}">Пользователь: {{ $order->user->name }}
                            {{ $order->user->surname }}</a>
                    </div>
                </div>
                <div class="info col-auto">
                    <form action="{{ route('manager-order-update', $order->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <select class="form-select form-control mb-0" name="status" id="status">
                            @foreach ($status as $status)
                                <option value="{{ $status->id }}"
                                    {{ $status->id == $order->id_status ? 'selected' : '' }}>
                                    {{ $status->name }}</option>
                            @endforeach
                        </select>
                </div>
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
            <div class="d-flex justify-content-between outline">
                <div class="d-flex">
                    <div class="info">
                        <p>Объявленная стоимость: {{ $order->declared_cost }}</p>
                    </div>
                    <div class="info">
                        <p>Дата: {{ $order->delivery_date }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Груз --}}
        <div class="row">
            <div class="col-12">
                <div class="title-div align-items-center">
                    <h4 class="orders-info m-3">Груз</h4>
                </div>
            </div>
        </div>
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

        {{-- Цена --}}
        <div class="row">
            <div class="info d-flex justify-content-end">
                <div class=" col-auto">
                    <div class="form-floating">
                        <x-text-input id="cost" class="form-control m-0" type="text" name="cost"
                            value="{{ $order->cost }}" required placeholder="Итого, ₽" />
                        <x-input-label for="cost" value="Итого, ₽" />
                        <x-input-error :messages="$errors->get('cost')" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="info d-flex justify-content-end">
                <button class="btn px-2 py-1 me-3" type="submit">Сохранить</button>
                </form>

                {{-- Удалить --}}
                <form action="{{ route('manager-order-delete', $order->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn px-2 py-1" type="submit">Удалить</button>
                </form>
            </div>
        </div>
    </section>
@endsection
