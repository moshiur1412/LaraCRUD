<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach (request()->breadcrumbs()->segments() as $segment)
            @if (!is_numeric($segment->name()))
                @if ($segment->url() && !$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $segment->url() }}">{{ $segment->name() }}</a></li>
                @else
                    <li class="breadcrumb-item active">{{ $segment->name() }}</li>
                @endif
            @endif
        @endforeach
    </ol>
</nav>
