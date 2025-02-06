<div class="row">
    <div class="col-12">
        <div class="media d-flex outline align-items-center position-relative
@if($message->user_id == Auth::id())
flex-row-reverse
@endif">
            <div class=" min-w-35
    @if($message->user_id == Auth::id())
    d-flex flex-column align-items-end border-l
    @else
    border-r
    @endif">
                <div>
                    <p>{{ $message->user->name }}</p>
                </div>
                <div class="text-muted">
                    <p><small>{{ $message->created_at->diffForHumans(false, true) }}</small></p>
                </div>
            </div>
            <div class="
    @if($message->user_id == Auth::id())
    mes-r
    @else
    mes-l
    @endif">
                <p class="mes-p">{{ $message->body }}</p>
            </div>
        </div>
    </div>
</div>
