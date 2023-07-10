<x-admin.button-icon-edit
    href="javascript:void(0)"
    data-id="{{$model->id}}"
    id="btn-show"
    title="Show details" />

@if ($model->user->count() == null)
    <x-admin.button-icon-delete href="{{ route('role.destroy', $model) }}" />
@endif

<x-admin.alert-delete/>
