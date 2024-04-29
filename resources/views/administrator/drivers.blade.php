@extends('layouts.dashboard')
@section('title')
    Водители
@endsection

@section('content')
    <section class="mb-0">
        <div class="row">
            <div class="col-12">
                <div class="title-div d-flex align-items-center justify-content-center">
                    <h2 class="orders-info">Водители</h2>

                    <!-- Кнопка-триггер модального окна -->
                    <button type="button" class="btn p-2" data-bs-toggle="modal" data-bs-target="#newDriver">Добавить</button>
                </div>
            </div>
        </div>

        <!-- Модальное окно -->
        <div class="modal fade" id="newDriver" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Добавления нового водителя</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('administrator-drivers-create') }}" method="post">
                            @csrf
                            <div class="form-floating">
                                <input name="name" type="text" class="form-control" placeholder="Имя" required>
                                <label for="name">Имя</label>
                            </div>
                            <div class="form-floating">
                                <input name="patronymic" type="text" class="form-control" placeholder="Отчество" required>
                                <label for="patronymic">Отчество</label>
                            </div>
                            <div class="form-floating">
                                <input name="surname" type="text" class="form-control" placeholder="Фамилия" required>
                                <label for="surname">Фамилия</label>
                            </div>

                            <div class="form-floating">
                                <input name="phone" type="tel" id="phone" class="form-control" placeholder="Телефон" required>
                                <label for="phone">Телефон</label>
                            </div>

                            <div class="form-floating">
                                <input class="form-control" id="driver_license_number" name="driver_license_number" type="text" value="old('driver_license_number', $user->driver_license_number)" required  placeholder="Водительское удостоверение">
                                <label for="driver_license_number">Водительское удостоверение</label>
                            </div>

                            <div class="form-floating">
                                <input class="form-control" id="passport_series" name="passport_series" type="text" value="old('passport_series', $user->passport_series)" required pattern="[0-9]{4}" title="Введите корректные данные паспорта" placeholder="Серия паспорта">
                                <label for="passport_series">Серия паспорта</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="passport_number" name="passport_number" type="text" value="old('passport_number', $user->passport_number)" required pattern="[0-9]{3}-[0-9]{3}" title="Введите корректные данные паспорта" placeholder="Номер паспорта">
                                <label for="passport_number">Номер паспорта</label>
                            </div>

                            <button type="submit" class="btn form__btn p-3">Добавить</button>
                        </form>
                    </div>

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
                    <th>ФИО</th>
                    <th>Телефон</th>
                    <th>Водительское удостоверение</th>
                    <th>Серия паспорта</th>
                    <th>Номер паспорта</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ $driver->id }}</td>
                        <td>{{ $driver->name }} {{ $driver->patronymic }} {{ $driver->surname }}</td>
                        <td>{{ $driver->phone }}</td>
                        <td>{{ $driver->driver_license_number }}</td>
                        <td>{{ $driver->passport_series }}</td>
                        <td>{{ $driver->passport_number }}</td>
                        <td class="d-flex justify-content-between">
                            <button type="button" class="btn p-1" data-bs-toggle="modal" data-bs-target="#Driver{{ $driver->id }}">✎</button>
                            <form action="{{ route('administrator-drivers-delete', $driver->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn py-1 px-2">x</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Модальное окно -->
                    <div class="modal fade" id="Driver{{ $driver->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Изменение данных</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('administrator-drivers-update', $driver->id) }}" method="post">
                                        @csrf
                                        <div class="form-floating">
                                            <input value="{{ $driver->name }}" name="name" type="text" class="form-control" placeholder="Имя" required>
                                            <label for="name">Имя</label>
                                        </div>
                                        <div class="form-floating">
                                            <input value="{{ $driver->patronymic }}" name="patronymic" type="text" class="form-control" placeholder="Отчество" required>
                                            <label for="patronymic">Отчество</label>
                                        </div>
                                        <div class="form-floating">
                                            <input value="{{ $driver->surname }}" name="surname" type="text" class="form-control" placeholder="Фамилия" required>
                                            <label for="surname">Фамилия</label>
                                        </div>

                                        <div class="form-floating">
                                            <input value="{{ $driver->phone }}" name="phone" type="tel" id="phone" class="form-control" placeholder="Телефон" required>
                                            <label for="phone">Телефон</label>
                                        </div>

                                        <div class="form-floating">
                                            <input value="{{ $driver->driver_license_number }}" class="form-control" id="driver_license_number" name="driver_license_number" type="text" required  placeholder="Водительское удостоверение">
                                            <label for="driver_license_number">Водительское удостоверение</label>
                                        </div>

                                        <div class="form-floating">
                                            <input value="{{ $driver->passport_series }}" class="form-control" id="passport_series" name="passport_series" type="text" required pattern="[0-9]{4}" title="Введите корректные данные паспорта" placeholder="Серия паспорта">
                                            <label for="passport_series">Серия паспорта</label>
                                        </div>
                                        <div class="form-floating">
                                            <input value="{{ $driver->passport_number }}" class="form-control" id="passport_number" name="passport_number" type="text" required pattern="[0-9]{3}-[0-9]{3}" title="Введите корректные данные паспорта" placeholder="Номер паспорта">
                                            <label for="passport_number">Номер паспорта</label>
                                        </div>

                                        <button type="submit" class="btn form__btn p-3">Изменить</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
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
