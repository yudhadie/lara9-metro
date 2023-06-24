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
                                <th class="min-w-125px">Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
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

    <form action="" method="post" id="deleteForm">
        @csrf
        @method("DELETE")
        <input type="submit" value="Hapus" class="btn btn-danger" style="display: none">
    </form>

    @include('admin.setting.user.modal')

@endsection

@section('create')
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        {{-- <a href="{{ route('report.user') }}" target="_blank" class="btn btn-sm fw-bold btn-info">Print</a> --}}
        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add">Create</a>
    </div>
@endsection

@section('styles')

@endsection

@push('scripts')

    <script>
        document.getElementById('menu-setting').classList.add('show');
        document.getElementById('menu-setting-user').classList.add('active');
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
            //main function to initiate the module
            init: function() {
                initTable1();
            }
        };
        }();

        jQuery(document).ready(function() {
        KTDatatablesBasicBasic.init();
        });
    </script>
    <script>
        const form = document.getElementById('modal_form_form');
        var validator = FormValidation.formValidation(
            form,
            {
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
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
        const submitButton = document.getElementById('modal_form_submit');
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');
                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        form.submit();
                    }
                });
            }
        });
    </script>

@endpush
