<div class="{{$class}}">
    @if ($label != '')
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="{{$attributes->has('required') ? 'required' : ''}}" >
                {{$label}}
            </span>
        </label>
    @endif
    <div class="my-3 text-center">
        <img src="{{ asset('assets/media/misc/spinner.gif') }}" data-src="{{ asset($value) }}" class="lozad rounded mw-100 " alt=""/>
    </div>
    <input class="form-control form-control-solid"
        type="file"
        name="{{$name}}"
        value="{{$value}}"
        accept=".jpg,.jpeg,.png"
        {{$attributes->has('disabled') ? 'disabled' : ''}}
        {{$attributes->has('readonly') ? 'readonly' : ''}}
        />
</div>

