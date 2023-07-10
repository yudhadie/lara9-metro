@extends('admin.templates.default')

@section('content')

    <x-admin.card>
        <x-admin.show-item name='ID' :value='$data->id' />
        <x-admin.show-item name='Data' :value='$data->log_name' />
        <x-admin.show-item name='User' :value="$data->user->name ?? 'deleted'" />
        <x-admin.show-item name='Event' :value="$data->event" />
        <x-admin.show-item name='Action' :value="$data->properties" />
    </x-admin.card>

@endsection


@section('styles')

@endsection

@push('scripts')

    <x-admin.menu-show menu="menu-info"/>
    <x-admin.menu-active menu="menu-info-activity"/>

@endpush
