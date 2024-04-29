@extends('layouts.dashboard')
@section('title')
    Все заказы
@endsection
@section('content')
    <section class="orders mb-0">
        <div class="row">
            <div class="col-12">
                <div class="title-div">
                    <h2 class="orders-info">Все заказы</h2>
                </div>
            </div>
        </div>

        <div class="form-floating">
            <input id='txt_searchall' class="form-control mb-md-0" placeholder="Поиск">
            <label for="txt_searchall">Поиск</label>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered m-0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Дата</th>
                        <th>Пользователь</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td><a href="{{ route('manager-order', $order) }}">{{ $order->id }}</a></td>
                            <td>{{ $formattedDates[$order->id] }}</td>
                            <td><a href="{{ route('manager-order-user', $order->user->id) }}">{{ $order->user->name }}
                                    {{ $order->user->surname }} {{ $order->user->email }}</a></td>
                            <td>{{ $order->status->name }}</td>
                        </tr>
                    @endforeach
                    </tr>
                        <tr class='notfound'>
                            <td colspan='4'>Запись не найдена
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
