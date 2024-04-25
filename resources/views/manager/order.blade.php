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

            <div class="col-sm-12 col-md-4 info">
                <p>Маршрут: {{ $order->city_from }} - {{ $order->city_into }}</p>
            </div>
            <div class="col-sm-12 col-md-5 info">
                <a href="{{ route('manager-order-user', $order->user->id) }}">Пользователь: {{ $order->user->name }}
                    {{ $order->user->surname }}</a>
            </div>

            <div class="col-sm-12 col-md-3 info">
                <form action="{{ route('manager-order-update', $order->id) }}" method="post">
                    @csrf
                    @method('patch')
                    @if($order->status->id == 7)
                        <p>{{ $order->status->name }}</p>
                    @elseif($order->status->id == 8)
                        <p>{{ $order->status->name }}. Причина: {{ $order->reason }}</p>
                    @else
                        <select class="form-select form-control mb-0" name="status" id="status">
                            @foreach ($status as $status)
                                <option value="{{ $status->id }}" {{ $status->id == $order->id_status ? 'selected' : '' }}>
                                    {{ $status->name }}</option>
                            @endforeach
                        </select>
                    @endif
                    <div class="form-floating mt-2" style="display:none" id="reason">
                        <input class="form-control form-control m-0"   type="text" name="reason"  placeholder="Причина">
                        <label for="reason">Причина</label>
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

        {{-- Цена --}}
        <div class="row">
            <div class="col-sm-12 col-md-3 info">
                @if($order->status->id == 7)
                    <p>{{ $order->drivers->name }} {{ $order->drivers->surname }}</p>
                @elseif($order->status->id == 8)
                    <p>Водилеть не назначен</p>
                @else
                    <select class="form-select form-control mb-0" name="id_driver" id="id_driver">
                        <option value="-">-</option>
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}" {{ $driver->id == $order->id_driver ? 'selected' : '' }}>
                                {{ $driver->name }} {{ $driver->surname }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
            <div class="col-sm-12 col-md-3 info">
                @if($order->status->id == 7)
                    <p>{{ $order->transports->mark }}</p>
                @elseif($order->status->id == 8)
                    <p>Транспорт не назначен</p>
                @else
                    <select class="form-select form-control mb-0" name="id_transport" id="id_transport">
                        <option value="-">-</option>
                        @foreach ($transports as $transport)
                            <option value="{{ $transport->id }}" {{ $transport->id == $order->id_transport ? 'selected' : '' }}>
                                {{ $transport->mark }}</option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div class="col-sm-12 col-md-2 offset-md-2 info">
                @if($order->status->id == 7 or $order->status->id == 8)
                    <p>{{ $order->cost }}₽</p>
                @else
                    <div class="form-floating">
                        <x-text-input id="cost" class="form-control m-0" type="text" name="cost"
                                      value="{{ $order->cost }}" required placeholder="Итого, ₽" />
                        <x-input-label for="cost" value="Итого, ₽" />
                        <x-input-error :messages="$errors->get('cost')" class="mt-2" />
                    </div>
                @endif
            </div>

            @if($order->status->id == 7 or $order->status->id == 8)
            @else
                <div class="col-sm-12 col-md-2 info">
                    <button class="btn form__btn py-2" type="submit">Сохранить</button>
                </div>
            @endif
                </form>
        </div>
    </section>
@endsection
