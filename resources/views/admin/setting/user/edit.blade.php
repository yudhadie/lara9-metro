@extends('admin.templates.default')

@section('content')

    <x-admin.card>
        <x-admin.form-edit action="{{ route('user.update',$data) }}" enctype="multipart/form-data">
            <div class="d-flex flex-column fv-row">
                <div class="row mb-7">
                    <x-admin.form-item class="col-6 mb-5" label="Name" required>
                        <input class="form-control form-control-solid"
                            name="name"
                            value="{{$data->name}}"
                            placeholder="Enter a name"/>
                    </x-admin.form-item>
                    <x-admin.form-item class="col-6 mb-5" label="Username" required>
                        <input class="form-control form-control-solid"
                            name="username"
                            value="{{$data->username}}"
                            placeholder="Enter a username"
                            readonly />
                    </x-admin.form-item>
                    <x-admin.form-item class="col-6 mb-5" label="Email" required>
                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                            data-bs-toggle="popover"
                            data-bs-trigger="hover"
                            data-bs-html="true"
                            data-bs-content="Email tidak boleh sama">
                        </i>
                        <input class="form-control form-control-solid"
                            type="email"
                            name="email"
                            value="{{$data->email}}"
                            placeholder="Enter a email"/>
                    </x-admin.form-item>
                    <x-admin.form-item class="col-6 mb-5" label="Reset Password">
                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                            data-bs-toggle="popover"
                            data-bs-trigger="hover"
                            data-bs-html="true"
                            data-bs-content="Reset password (optional)">
                        </i>
                        <input class="form-control form-control-solid"
                            type="password"
                            name="password"
                            placeholder="reset new password"/>
                    </x-admin.form-item>
                    <x-admin.form-item class="col-6 mb-5" label="Role" required>
                        <select class="form-control form-control-solid"
                                data-control="select2"
                                name="current_team_id"
                                value="{{$data->current_team_id}}" >
                            @foreach ($teams as $team)
                                <option {{ ($team->id == $data->current_team_id) ? 'selected'  : ''}} value="{{$team->id}}">
                                    {{$team->name}}
                                </option>
                            @endforeach
                        </select>
                    </x-admin.form-item>
                    <x-admin.form-item class="col-6 mb-5" label="Status" required>
                        <select class="form-control form-control-solid"
                                data-control="select2"
                                name="active"
                                data-placeholder="Pilih Status..." >
                                @if ($data->active == 1)
                                    <option value="1" selected>Active</option>
                                    <option value="0">Non Active</option>
                                @else
                                    <option value="1">Active</option>
                                    <option value="0" selected>Non Active</option>
                                @endif
                        </select>
                    </x-admin.form-item>
                    <x-admin.form-item class="col-6 mb-5" label="Photo">
                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                            data-bs-toggle="popover"
                            data-bs-trigger="hover"
                            data-bs-html="true"
                            data-bs-content="Optional">
                        </i>
                        <div class="my-3 text-center">
                            <img
                                src="{{ asset('assets/media/misc/spinner.gif') }}"
                                data-src="{{ asset($data->photo) }}"
                                class="lozad rounded mw-100 "
                                alt=""
                            />
                        </div>
                        <input type="file" class="form-control form-control-solid" name="photo" placeholder="Photo" accept=".jpg,.jpeg,.png"/>
                        @isset($data->profile_photo_path)
                            <div class="mt-1 text-end">
                                <button class="btn btn-danger btn-sm mt-2"
                                    href="{{ route('delete-photo-user',$data->id) }}"
                                    id="delete"
                                    >
                                    Delete
                                </button>
                            </div>
                        @endisset
                    </x-admin.form-item>

                </div>
            </div>
            <x-admin.card-footer>
                <x-admin.button-back href="{{route('user.index')}}"/>
                <x-admin.button-save />
            </x-admin.card-footer>
        </x-admin.form-edit>
    </x-admin.card>

    <form action="{{route('delete-photo-user',$data->id)}}" method="post" id="deletePhoto">
        @csrf
        @method("PUT")
        <input type="submit" value="Hapus" class="btn btn-danger" style="display: none">
    </form>


@endsection


@section('styles')

@endsection

@push('scripts')

    <x-admin.menu-show menu="menu-setting"/>
    <x-admin.menu-active menu="menu-setting-user"/>
    <x-admin.alert-delete-photo/>
    <x-admin.script-validation>
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
    </x-admin.script-validation>

@endpush
