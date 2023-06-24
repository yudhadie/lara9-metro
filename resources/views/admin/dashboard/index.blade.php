@extends('admin.templates.default')

@section('content')


@endsection

@section('styles')

@endsection

@push('scripts')

    <script>
        document.getElementById('menu-dashboard').classList.add('active');
    </script>

@endpush
