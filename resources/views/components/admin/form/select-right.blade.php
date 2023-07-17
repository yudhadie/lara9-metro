<div class="row mb-6">
    <label class="col-lg-4 col-form-label fw-bold fs-6">
        <span class="{{$attributes->has('required') ? 'required' : ''}}">
            {{$label}}
        </span>
    </label>
    <div class="col-lg-8 fv-row">
        <select class="form-select form-select-solid form-select-lg fw-bold"
            name="{{$name}}"
            value="{{$value}}"
            data-placeholder="{{ $attributes->has('data-placeholder') ? $attributes['data-placeholder'] : 'Pilih Satu...'}}"
            data-control="select2">
            @if ($collection == '')
                {{$slot}}
            @else
                @foreach ($collection as $item)
                    @if ($value == '')
                        <option></option>
                    @endif
                    <option value="{{$item->id}}" {{$item->id == $value ? 'selected' : ''}}>
                        {{$item->name}}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
</div>
