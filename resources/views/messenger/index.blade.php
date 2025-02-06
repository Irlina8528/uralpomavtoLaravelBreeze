@extends('layouts.dashboard')
@section('title')
    Поддержка
@endsection
@section('content')
    <section class=" mb-0">
        @if (Auth::user()->userType->name == 'manager')
            <div class="row">
                <div class="col-12">
                    <div class="title-div d-flex align-items-center justify-content-center">
                        <h2 class="orders-info">Обращения пользователей</h2>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="title-div d-flex align-items-center justify-content-center">
                        <h2 class="orders-info">Ваши обращения</h2>

                        <button type="button" class="btn p-2" data-bs-toggle="modal" data-bs-target="#newMessages">Задать новый вопрос</button>
                    </div>
                </div>
            </div>

            <!-- Модальное окно -->
            <div class="modal fade" id="newMessages" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Задать новый вопрос</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('messages.store') }}" method="post">
                                @csrf

                                <div class="form-floating">
                                    <input name="subject" type="text" class="form-control" placeholder="Тема" required>
                                    <label for="subject">Тема</label>
                                </div>

                                <div class="form-floating">
                                    <textarea name="message" class="form-control textareai" placeholder="Сообщение" required></textarea>
                                    <label for="message">Сообщение</label>
                                </div>

                                <button type="submit" class="btn form__btn p-3">Отправить</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        @endif



    <div class="row">
        @include('messenger.partials.flash')

        @if (Auth::user()->userType->name == 'manager')
        <div class="table-responsive">
            <table class="table table-bordered m-0">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Тема</th>
                    <th>ФИО</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                @each('messenger.partials.thread', $threadsAll, 'thread', 'messenger.partials.no-threads')
                </tbody>
            </table>
        </div>
        @else
            @if($threads->isNotEmpty())
            <div class="row">
                <div class="col-12">
                    <div class="title-div align-items-center">
                        <h4 class="orders-info m-3">Активные:</h4>
                    </div>
                </div>
            </div>
            @endif
            @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')

            @if($threadsDel->isNotEmpty())
                <div class="row">
                    <div class="col-12">
                        <div class="title-div align-items-center">
                            <h4 class="orders-info m-3">Завершенные:</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($threadsDel as $item)
                        <div class="col-sm-12 col-md-auto">
                            <div class="info">
                                <a href="{{ route('messages.show', $item->id) }}" class="btn px-3 py-1 form__btn position-relative">{{ $item->subject }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif

    </div>



    </section>
@stop
