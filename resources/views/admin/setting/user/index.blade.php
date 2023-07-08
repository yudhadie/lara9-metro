@extends('admin.templates.default')

@section('content')

    <x-admin.card>
        <x-admin.table-api>
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th>No</th>
                    <th class="min-w-125px">Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </x-admin.table-api>
    </x-admin.card>

    <x-admin.modal-create :title="$title" action="{{ route('user.store') }}" enctype="multipart/form-data">
        <x-admin.form-item class="col-6 mb-5" label="Username" required>
            <input class="form-control form-control-solid"
                oninput="this.value=this.value.toLowerCase()"
                name="username"
                placeholder="Enter a username"/>
        </x-admin.form-item>
        <x-admin.form-item class="col-12 mb-5" label="Name" required>
            <input class="form-control form-control-solid"
                name="name"
                placeholder="Enter a name"/>
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
                placeholder="Email"/>
        </x-admin.form-item>
        <x-admin.form-item class="col-6 mb-5" label="Password" required>
            <input class="form-control form-control-solid"
                type="password"
                name="password"
                placeholder="Password" />
        </x-admin.form-item>
        <x-admin.form-item class="col-6 mb-5" label="Role" required>
            <select class="form-control form-control-solid"
                    data-control="select2"
                    data-dropdown-parent="#modal_add"
                    name="current_team_id"
                    data-placeholder="Pilih Role..." >
                <option value="">Select a Roles...</option>
                @foreach ($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach
            </select>
        </x-admin.form-item>
        <x-admin.form-item class="col-6 mb-5" label="Status" required>
            <select class="form-control form-control-solid"
                    data-dropdown-parent="#modal_add"
                    data-control="select2"
                    name="active"
                    data-placeholder="Pilih Status..." >
                <option value="1">Active</option>
                <option value="0">Non Active</option>
            </select>
        </x-admin.form-item>
        <x-admin.form-item class="col-12 mb-5" label="Photo">
            <input class="form-control form-control-solid"
                    type="file"
                    accept=".jpg,.jpeg,.png"
                    name="photo"
                    placeholder="Photo" />
        </x-admin.form-item>

    </x-admin.modal-create>

    <x-admin.form-delete />

@endsection

@section('create')

    <x-admin.header-button>
        <x-admin.button-modal-create />
    </x-admin.header-button>

@endsection

@section('styles')

@endsection

@push('scripts')

    <x-admin.menu-show menu="menu-setting"/>
    <x-admin.menu-active menu="menu-setting-user"/>
    <x-admin.script-table>
        ajax: '{{ route('user.data') }}',
        columns: [
            {data:'DT_RowIndex', orderable: false, searchable: false},
            {data:'name'},
            {data:'email'},
            {data:'role'},
            {data:'status'},
            {data:'action', responsivePriority: -1},
        ],
        columnDefs: [
            {
                targets: 0,
                className: 'dt-center',
                width: '30px',
            },
            {
                targets: [3,4,5],
                className: 'dt-center',
            },
        ],
    </x-admin.script-table>
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
            'password': {
                validators: {
                    notEmpty: {
                        message: 'Silahkan isi password!'
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
