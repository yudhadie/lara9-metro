<div {{ $attributes }}>
    <label class="fs-6 fw-semibold form-label mb-2">
        @if ($attributes->has('required'))
            <span class="required">{{$label ?? ''}}</span>
        @else
            <span>{{$label ?? ''}}</span>
        @endif
    </label>
    {{$slot}}
</div>

