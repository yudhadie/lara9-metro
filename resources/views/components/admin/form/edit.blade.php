<form class="form mt-7" method="post" id="modal_form_form" {{ $attributes }}>
    {{ csrf_field() }} {{ method_field('PUT') }}
    <div class="row mb-7">
        {{$slot}}
    </div>
</form>
