@extends('admin.templates.default')

@section('content')

    <x-admin.card.default>
        <x-admin.content.table-api>
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th>No</th>
                    <th class="min-w-125px">Data</th>
                    <th>ID</th>
                    <th>User</th>
                    <th>Event</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </x-admin.content.table-api>
    </x-admin.card.default>

@endsection

@section('head_button')

@endsection

@section('styles')

@endsection

@push('scripts')

    <x-admin.menu.show menu="menu-info"/>
    <x-admin.menu.active menu="menu-info-activity"/>

    <x-admin.script.table>
        ajax: '{{ route('activity.data') }}',
        columns: [
            {data:'DT_RowIndex', orderable: false, searchable: false},
            {data:'log_name'},
            {data:'subject_id'},
            {data:'user'},
            {data:'event'},
            {data:'action', responsivePriority: -1,orderable: false, searchable: false},
        ],
        columnDefs: [
            {
                targets: [0,2,3,4,5],
                className: 'dt-center',
            },
        ],
    </x-admin.script.table>

@endpush
