@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.form.edit action="{{ route('user.update',$data) }}" enctype="multipart/form-data">
            <x-admin.form.input-right label="Username" name="username" type="text" value="{{ $data->username }}" readonly />
            <x-admin.form.input-right label="Nama" name="name" type="text" value="{{ $data->name }}" required />
            <x-admin.form.input-right label="Email" name="email" type="email" value="{{ $data->email }}" required />
            <x-admin.form.select-right label="Role" name="current_team_id" value="{{ $data->current_team_id }}" :collection=$teams required />
            <x-admin.form.select-right label="Status" name="active" value="{{$data->active}}" collection='' required>
                @if ($data->active == 1)
                    <option selected value="1">Active</option>
                    <option value="2">Non Active</option>
                @else
                    <option value="1">Active</option>
                    <option selected value="2">Non Active</option>
                @endif
            </x-admin.form.select-right>
            <x-admin.form.input-right label="Reset Password" name="password" type="password" value=""/>
            <x-admin.form.input-right label="Photo Profile" name="profile_photo_path" type="file" value="{{ $data->profile_photo_path }}" accept=".jpeg,.jpg,.png">
                <img class="mw-100 mh-300px card-rounded mb-2" src="{{ asset($data->photo) }}"/>
            </x-admin.form.input-right>
            <x-admin.card.footer>
                <x-admin.button.back href="{{route('user.index')}}"/>
                <x-admin.button.save />
            </x-admin.card.footer>
        </x-admin.form.edit>
    </x-admin.card.default>

    <x-admin.form.delete-photo :item='$data->id'/>

@endsection


@section('styles')

@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-setting"/>
    <x-admin.menu.active menu="menu-setting-user"/>
    <x-admin.alert.delete-photo/>
    <x-admin.script.validation>
        fields: {
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Silahkan isi nama!'
                    }
                }
            },
            'email': {
                validators: {
                    notEmpty: {
                        message: 'Silahkan isi dengan format email!'
                    }
                }
            },
            'current_team_id': {
                validators: {
                    notEmpty: {
                        message: 'Silahkan pilih Role!'
                    }
                }
            },
            'active': {
                validators: {
                    notEmpty: {
                        message: 'Silahkan pilih status!'
                    }
                }
            },
        },
    </x-admin.script.validation>

@endpush
