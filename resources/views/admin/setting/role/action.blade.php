<x-admin.button.icon type="show" href="javascript:void(0)" data-id="{{$model->id}}" id="btn-show" />

@if ($model->user->count() == 0)
    <x-admin.button.icon type="delete" href="{{ route('role.destroy', $model) }}" />
    <x-admin.alert.delete/>
@endif


