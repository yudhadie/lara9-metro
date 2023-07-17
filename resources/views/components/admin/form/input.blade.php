<div class="{{$class}}">
    @if ($label != '')
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="{{$attributes->has('required') ? 'required' : ''}}" >
                {{$label}}
            </span>
        </label>
    @endif
    {{$slot}}
    <input class="form-control form-control-solid" {{ $attributes }}
        type="{{$type}}"
        name="{{$name}}"
        value="{{$value}}"
        {{$attributes->has('disabled') ? 'disabled' : ''}}
        {{$attributes->has('readonly') ? 'readonly' : ''}}
        />
</div>
