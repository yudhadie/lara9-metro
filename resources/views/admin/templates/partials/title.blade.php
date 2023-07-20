<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack container-fluid">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{$title ?? ''}}</h1>
            {!! $breadcrumbs ?? '' !!}
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            @yield('head_button')
        </div>
    </div>
</div>
