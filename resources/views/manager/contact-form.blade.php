@extends('layouts.dashboard')
@section('title')
    Контактная форма
@endsection
@section('content')
    <section class="orders mb-0">
        <div class="row">
            <div class="col-12">
                <div class="title-div">
                    <h2 class="orders-info">Контактная форма</h2>
                </div>
            </div>
        </div>
        @if ($data->isEmpty())
            <p>Нет данных для отображения</p>
        @else
        
            <div class="table-responsive">
                <table class="table table-bordered m-0">
                    <thead>
                        <tr>
                            <th>Имя/Название</th>
                            <th>Телефон</th>
                            <th>Вопрос</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td class="td"><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></td>
                                <td>{{ $item->question }}</td>
                                <td>
                                    <form action="{{ route('manager-contact-form-dell', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn px-2 py-1" type="submit">Выполнен</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
