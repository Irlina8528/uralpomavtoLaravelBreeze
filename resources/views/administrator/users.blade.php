@extends('layouts.dashboard')
@section('title')
    Пользователи
@endsection

@section('content')
    <section class="mb-0">
        <div class="row">
            <div class="col-12">
                <div class="title-div">
                    <h2 class="orders-info">Все пользователи</h2>
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
                    <th>Почта</th>
                    <th>Адрес</th>
                    <th>Компания</th>
                    <th>Тип</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }} {{ $user->patronymic }} {{ $user->surname }}</td>
                        @if($user->phone)
                            <td>{{ $user->phone }}</td>
                        @else
                            <td>-</td>
                        @endif

                        <td>{{ $user->email }}</td>

                        @if($user->address)
                            <td>{{ $user->address }}</td>
                        @else
                            <td>-</td>
                        @endif

                        @if($user->id_company)
                            <td>{{ $user->company->name }}</td>
                        @else
                            <td>-</td>
                        @endif
                        <td>
                            <form action="{{ route('administrator-users-update', $user->id) }}" method="post">
                                @csrf
                                <select class="form-select form-control mb-0" name="userType" id="userType">
                                    @foreach ($userTypes as $userType)
                                        <option value="{{ $userType->id }}" {{ $userType->id == $user->id_usertype ? 'selected' : '' }}>
                                            {{ $userType->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn form__btn p-1" type="submit">Изменить</button>
                            </form>
                        </td>
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
