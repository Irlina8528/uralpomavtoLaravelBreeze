@extends('layouts.dashboard')
@section('title')
    Транспорт
@endsection

@section('content')
    <section class="mb-0">
        <div class="row">
            <div class="col-12">
                <div class="title-div d-flex align-items-center justify-content-center">
                    <h2 class="orders-info">Транспорт</h2>

                    <!-- Кнопка-триггер модального окна -->
                    <button type="button" class="btn p-2" data-bs-toggle="modal" data-bs-target="#newTransport">Добавить</button>
                </div>
            </div>
        </div>

        <!-- Модальное окно -->
        <div class="modal fade" id="newTransport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Добавления нового транспорта</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('administrator-transport-create') }}" method="post">
                            @csrf
                            <div class="form-floating">
                                <input name="mark" type="text" class="form-control" placeholder="Марка" required>
                                <label for="mark">Марка</label>
                            </div>
                            <div class="form-floating">
                                <input name="state_number" id="state_number" type="text" class="form-control" placeholder="Гос. номер" required>
                                <label for="state_number">Гос. номер</label>
                            </div>

                            <div class="form-floating">
                                <input name="length" type="text" class="form-control" placeholder="Длина, м" required>
                                <label for="length">Длина, м</label>
                            </div>
                            <div class="form-floating">
                                <input name="width" type="text" class="form-control" placeholder="Ширина, м" required>
                                <label for="width">Ширина, м</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" name="height" type="text" required  placeholder="Высота, м">
                                <label for="height">Высота, м</label>
                            </div>

                            <div class="form-floating">
                                <input class="form-control" name="tonnage" type="text" required placeholder="Грузоподъёмность, т">
                                <label for="tonnage">Грузоподъёмность, т</label>
                            </div>

                            <button type="submit" class="btn form__btn p-3">Добавить</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered m-0">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Марка</th>
                    <th>Гос. номер</th>
                    <th>Длина, м</th>
                    <th>Ширина, м</th>
                    <th>Высота, м</th>
                    <th>Грузоподъёмность, т</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($transports as $transport)
                    <tr>
                        <td>{{ $transport->id }}</td>
                        <td>{{ $transport->mark }}</td>
                        <td>{{ $transport->state_number }}</td>
                        <td>{{ $transport->length }}</td>
                        <td>{{ $transport->width }}</td>
                        <td>{{ $transport->height }}</td>
                        <td>{{ $transport->tonnage }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
