@extends('admin.templates.default')

@section('content')

    <x-admin.card>
        <x-admin.table-api>
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th>No</th>
                    <th class="min-w-125px">Name</th>
                    <th>Use</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </x-admin.table-api>
    </x-admin.card>

    <x-admin.modal-create :title="$title" action="{{ route('role.store') }}">
        <x-admin.form-item class="col-12 mb-5" label="Name" required>
            <input class="form-control form-control-solid"
                name="name"
                placeholder="Enter a name"/>
        </x-admin.form-item>
    </x-admin.modal-create>

    <x-admin.modal-show>
        <x-admin.form-item class="col-12 mb-5" label="Name" required>
            <input class="form-control form-control-solid"
                name="name"
                id="name"
                placeholder="Enter a name"/>
        </x-admin.form-item>
    </x-admin.modal-show>

    <x-admin.form-delete />

@endsection

@section('create')

    <x-admin.header-button>
        <x-admin.button-modal-create />
    </x-admin.header-button>

@endsection


@push('scripts')

    <x-admin.menu-show menu="menu-setting"/>
    <x-admin.menu-active menu="menu-setting-role"/>

    <x-admin.script-table>
        ajax: '{{ route('role.data') }}',
        columns: [
            {data:'DT_RowIndex', orderable: false, searchable: false},
            {data:'name'},
            {data:'use'},
            {data:'action', responsivePriority: -1,orderable: false, searchable: false},
        ],
        columnDefs: [
            {
                targets: 0,
                className: 'dt-center',
                width: '40px',
            },
            {
                targets: [-1,-2],
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
        },
    </x-admin.script-validation>
    <script>
        $('body').on('click', '#btn-show', function () {
            let data_id = $(this).data('id');
            $.ajax({
                url: "{{route('role.index')}}" + '/' + data_id,
                type: "GET",
                cache: false,
                success:function(response){
                    $('#data_id').val(response.data.id);
                    $('#name').val(response.data.name);
                    // $('#modal_update').val(response.data.id);
                    $('#modal_update').val(response.data.id)
                    $('#modal-show').modal('show');
                }
            });
            document.getElementById("modal_update").action = "{{route('role.index')}}" + '/' + data_id;
        });
    </script>

@endpush
