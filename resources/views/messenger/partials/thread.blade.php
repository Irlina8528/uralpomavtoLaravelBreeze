@if (Auth::user()->userType->name == 'manager')
    <tr>
        <td>{{ $thread->id }}</td>
        <td><a href="{{ route('messages.show', $thread->id) }}" class="btn px-3 py-1 form__btn position-relative">
                {{ $thread->subject }}
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $thread->userUnreadMessagesCount(Auth::id()) }}
            <span class="visually-hidden">непрочитанные сообщения</span>
        </span>
            </a></td>
        <td><a href="{{ route('manager-order-user', $thread->creator()->id) }}">{{ $thread->creator()->name }} {{ $thread->creator()->surname }}</a></td>
        <td>@if($thread->deleted_at)
                Завершен
            @else
                Активен
            @endif</td>
    </tr>
@else
    <div class="col-sm-12 col-md-auto">
        <div class="info">
            <a href="{{ route('messages.show', $thread->id) }}" class="btn px-3 py-1 form__btn position-relative">
                {{ $thread->subject }}
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $thread->userUnreadMessagesCount(Auth::id()) }}
            <span class="visually-hidden">непрочитанные сообщения</span>
        </span>
            </a>
        </div>
    </div>
@endif




