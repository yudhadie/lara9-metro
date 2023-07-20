<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on")
    <script>
        document.getElementById('kt_app_sidebar_toggle').classList.add('active');
    </script>
@endif
@include('admin.templates.partials.toastr')

@stack('scripts')

