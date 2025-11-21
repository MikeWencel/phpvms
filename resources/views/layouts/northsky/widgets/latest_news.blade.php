<div class="d-flex flex-column gap-3">
    @if ($news->count() === 0)
        <div class="text-center text-muted py-4 border border-secondary-subtle rounded-3 bg-dark">
            @lang('widgets.latestnews.nonewsfound')
        </div>
    @endif

    @foreach ($news as $item)
        <article class="p-3 border border-secondary-subtle rounded-3 bg-dark shadow-sm text-light">
            <header class="mb-2">
                <h4 class="h5 text-warning mb-1">{{ $item->subject }}</h4>
                <p class="small text-muted mb-0">
                    {{ $item->user->name_private }} · {{ show_datetime($item->created_at) }}
                </p>
            </header>
            <div class="news-body small">
                {!! $item->body !!}
            </div>
        </article>
    @endforeach
</div>
