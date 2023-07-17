<div {{ $attributes }}>
    @if ($label != '')
        <label class="fs-6 fw-semibold form-label mb-2">
            <span class="{{$attributes->has('required') ? 'required' : ''}}" >
                {{$label}}
            </span>
        </label>
    @endif
    <select class="form-select form-select-solid form-select-lg fw-bold"
        name="{{$name}}"
        data-control="select2"
        data-placeholder="{{ $attributes->has('data-placeholder') ? $attributes['data-placeholder'] : 'Pilih Satu...'}}"
        {{$attributes->has('disabled') ? 'disabled' : ''}}
        {{$attributes->has('readonly') ? 'readonly' : ''}}
        {{ $attributes }}
        value="{{$value}}">
        @foreach ($collection as $item)
            @if ($value == '')
                <option></option>
            @endif
            <option value="{{$item->id}}" {{$item->id == $value ? 'selected' : ''}}>
                {{$item->name}}
            </option>
        @endforeach
    </select>
</div>
