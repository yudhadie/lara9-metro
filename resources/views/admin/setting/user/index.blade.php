@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.content.table-api>
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
        </x-admin.content.table-api>
    </x-admin.default>

    <x-admin.modal.create :title="$title" action="{{ route('user.store') }}" enctype="multipart/form-data">
        <x-admin.form.input class="col-6 mb-5" label="Username" name="username" type="text" value="" required />
        <x-admin.form.input class="col-12 mb-5" label="Nama" name="name" type="text" value="" required />
        <x-admin.form.input class="col-6 mb-5" label="Email" name="email" type="text" value="" required />
        <x-admin.form.input class="col-6 mb-5" label="Password" name="password" type="password" value="" required />
        <x-admin.form.select class="col-6 mb-5" label="Role" name="current_team_id" value="" :collection=$teams data-dropdown-parent="#modal_add" required/>
    </x-admin.modal.create>

    <x-admin.form.delete />

@endsection

@section('head_button')

    <x-admin.content.header-button>
        <x-admin.button.modal-create />
    </x-admin.content.header-button>

@endsection

@section('styles')

@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-setting"/>
    <x-admin.menu.active menu="menu-setting-user"/>
    <x-admin.script.table>
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
                width: '40px',
            },
            {
                targets: [3,4,5],
                className: 'dt-center',
            },
        ],
    </x-admin.script.table>
    <x-admin.script.validation>
        fields: {
            'username': {
                validators: {
                    notEmpty: {
                        message: 'Silahkan isi data!'
                    }
                }
            },
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
        },
    </x-admin.script.validation>

@endpush
