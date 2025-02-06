@if(!$thread->deleted_at)
<div class="outline">
    <form action="{{ route('messages.update', $thread->id) }}" method="post">
        {{ method_field('put') }}
        {{ csrf_field() }}
        <div class="col-sm-12 col-md-6 offset-md-3">
            <!-- Message Form Input -->
            <div class="form-floating">
                <textarea name="message" class="form-control mes-textarea" placeholder="Новое сообщение" required ></textarea>
                <label for="message">Новое сообщение</label>
            </div>

            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn form__btn mb-3">Отправить</button>
            </div>
        </div>
    </form>
</div>
@endif
