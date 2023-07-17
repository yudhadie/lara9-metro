<div class="row mb-6">
    <label class="col-lg-4 col-form-label fw-bold fs-6 {{$attributes->has('required') ? 'required' : ''}}">
        {{$label}}
    </label>
    <div class="col-lg-8 fv-row">
        {{$slot}}
        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="{{$type}}" name="{{$name}}" value="{{ $value }}"/>
    </div>
</div>
