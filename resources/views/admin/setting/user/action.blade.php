<x-admin.button.icon type="edit" href="{{ route('user.edit', $model) }}" />

@if ($model->id != 1)
    <x-admin.button.icon type="delete" href="{{ route('user.destroy', $model) }}" />
    <x-admin.alert.delete/>
@endif


