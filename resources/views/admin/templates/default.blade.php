<!DOCTYPE html>
<html lang="en">
    @include('admin.templates.partials.head')
	<body id="kt_app_body"
		data-kt-app-layout="dark-sidebar"
		data-kt-app-header-fixed="true"
		data-kt-app-sidebar-enabled="true"
		data-kt-app-sidebar-fixed="true"
		data-kt-app-sidebar-hoverable="true"
		data-kt-app-sidebar-push-header="true"
		data-kt-app-sidebar-push-toolbar="true"
		data-kt-app-sidebar-push-footer="true"
		data-kt-app-toolbar-enabled="true"
		class="app-default
        ">
        @include('admin.templates.partials.theme')

		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                @include('admin.templates.partials.header')
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    @include('admin.templates.partials.sidebar')
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <div class="d-flex flex-column flex-column-fluid">
                            @include('admin.templates.partials.title')

                                <div id="kt_app_content_container" class="app-container container-xxl">
                                    @include('admin.templates.partials.alert')
                                </div>

                            @yield('content')

                        </div>
                        @include('admin.templates.partials.footer')
					</div>
				</div>
			</div>
		</div>

        @include('admin.templates.partials.scrolltop')
        @include('admin.templates.partials.script')
	</body>
</html>

