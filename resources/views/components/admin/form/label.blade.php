<div {{ $attributes }}>
    <label class="fs-6 fw-semibold form-label mb-2">
        <span class="{{$attributes->has('required') ? 'required' : ''}}" >
            {{$label}}
        </span>
    </label>
    <div>
        {{$slot}}
    </div>
</div>
