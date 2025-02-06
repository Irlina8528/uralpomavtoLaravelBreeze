@extends('layouts.dashboard')
@section('title')
    {{ $thread->subject }}
@endsection
@section('content')
    <section class="mes-container mb-0">
        <div class="row align-items-center">
            <div class="col-2">
                <button class="btn p-1" onclick="history.back()">❮</button>
            </div>
            <div class="col-9 offset-0 col-md-auto offset-md-2 d-flex align-items-center justify-content-center">
                <h2 class="orders-info">{{ $thread->subject }}</h2>
                @if(!$thread->deleted_at)
                <form action="{{ route('messages-del', $thread->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn py-1 px-2">Вопрос решен</button>
                </form>
                @endif
            </div>
        </div>

    <div class="mes-main">
        <div class="row">
            <div class="col-12">
                @each('messenger.partials.messages', $thread->messages, 'message')
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-12">
                @include('messenger.partials.form-message')
            </div>
        </div>
    </section>
@stop
