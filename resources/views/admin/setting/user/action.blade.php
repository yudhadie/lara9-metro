<x-admin.button-icon-edit href="{{ route('user.edit', $model) }}" />

@if ($model->id != 1)
    <x-admin.button-icon-delete href="{{ route('user.destroy', $model) }}" />
@endif

<x-admin.alert-delete/>

