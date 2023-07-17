@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.form.show name='ID' :value='$data->id' />
        <x-admin.form.show name='Data' :value='$data->log_name' />
        <x-admin.form.show name='User' :value='$data->user->name ?? "deleted"' />
        <x-admin.form.show name='Event' :value='$data->event' />
        <x-admin.form.show name='Action' :value='$data->properties' />
        <x-admin.card.footer>
            <x-admin.button.back href="{{route('activity.index')}}"/>
        </x-admin.card.footer>
    </x-admin.card.default>

@endsection


@section('styles')

@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-info"/>
    <x-admin.menu.active menu="menu-info-activity"/>

@endpush
