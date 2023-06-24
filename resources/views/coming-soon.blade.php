<html lang="en">
    @include('admin.templates.partials.head')

	<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<div class="d-flex flex-column flex-root">
			<style>
                body { background-image: url({{asset('assets/media/bg-login3.jpg')}}); }
            </style>
			<div class="d-flex flex-column flex-center flex-column-fluid">
				<div class="d-flex flex-column flex-center text-center p-10">
					<div class="card card-flush w-lg-650px py-5">
						<div class="card-body py-15 py-lg-20">
							<div class="mb-13">
								<a href="#" class="">
									<img alt="Logo" src="{{asset('assets/media/logos/logo-min.png')}}" />
								</a>
							</div>
							<h1 class="fw-bolder text-gray-900 mb-7">We're Launching Soon</h1>
							<div class="fw-semibold fs-6 text-gray-500 mb-7">
                                This is your opportunity to get creative amazing opportunaties that gives readers an idea
                            </div>
                           @auth
                                <a href="{{route('dashboard')}}" class="btn btn-primary">Dashboard</a>
                                <div class="text-gray-500 text-center fw-semibold fs-6 mt-3"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <a href="{{ route('logout') }}" class="link-primary">
                                        Sign Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            @else
                                <a href="{{route('dashboard')}}" class="btn btn-primary">Login</a>
                            @endauth
							<div class="mb-n5">
								<img src="{{asset('assets/media/illustrations/error-3.png')}}" class="mw-100 mh-300px theme-light-show" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        @include('admin.templates.partials.script')
	</body>

</html>
