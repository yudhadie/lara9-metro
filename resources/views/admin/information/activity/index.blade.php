@extends('admin.templates.default')

@section('content')

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card card-flush">
                <div class="card-body pt-0 mt-7">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="datatable">
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
                        <tbody class="fw-semibold text-gray-600">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('create')

@endsection

@section('styles')

@endsection

@push('scripts')

    <script>
        document.getElementById('menu-info').classList.add('show');
        document.getElementById('menu-info-activity').classList.add('active');
    </script>
    <script>
        "use strict";
        var KTDatatablesBasicBasic = function() {
        var initTable1 = function() {
            var table = $('#datatable');
            table.DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
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
                dom:
                    "<'row'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                    ">" +
                    "<'table-responsive'tr>" +
                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">",
            });

        };

        return {
            init: function() {
                initTable1();
            }
        };
        }();

        jQuery(document).ready(function() {
        KTDatatablesBasicBasic.init();
        });
    </script>

@endpush
