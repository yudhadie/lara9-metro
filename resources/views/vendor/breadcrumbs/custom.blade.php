@unless ($breadcrumbs->isEmpty())
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumb-item"><a class="text-gray-600" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="breadcrumb-item text-gray-500">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ul>
@endunless
