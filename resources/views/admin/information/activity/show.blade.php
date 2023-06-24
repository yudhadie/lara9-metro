@extends('admin.templates.default')

@section('content')

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card card-flush">
                {{-- <div class="card-header">
                    <h3 class="card-title">User Detail</h3>
                </div> --}}
                <div class="card-body pt-0 mt-10">
                    <div class="row mb-7">
                        <label class="col-lg-2 fw-semibold text-muted">ID</label>
                        <div class="col-lg-10">
                            <span class="fw-bold fs-6 text-gray-800">{{$data->id}}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-2 fw-semibold text-muted">Data</label>
                        <div class="col-lg-10">
                            <span class="fw-bold fs-6 text-gray-800">{{$data->log_name}}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-2 fw-semibold text-muted">User</label>
                        <div class="col-lg-10">
                            <span class="fw-bold fs-6 text-gray-800">{{$data->user->name ?? 'deleted'}}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-2 fw-semibold text-muted">Event</label>
                        <div class="col-lg-10">
                            @if ($data->event == 'created')
                                <span class="text-success">created</span>
                            @elseif ($data->event == 'updated')
                                <span class="text-warning">updated</span>
                            @elseif ($data->event == 'deleted')
                                <span class="text-danger">deleted</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-2 fw-semibold text-muted">Action</label>
                        <div class="col-lg-10">
                            <span class="fw-bold fs-6 text-gray-800">{{$data->properties}}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('activity.index') }}" class="btn btn-light me-3">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('styles')

@endsection

@push('scripts')

    <script>
        document.getElementById('menu-info').classList.add('show');
        document.getElementById('menu-info-activity').classList.add('active');
    </script>

@endpush
