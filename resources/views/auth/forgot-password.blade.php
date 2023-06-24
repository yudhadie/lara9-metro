<html lang="en">
	@include('admin.templates.partials.head')
	<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<div class="d-flex flex-column flex-root">
			<style>body { background-image: url({{asset('assets/media/bg/login.jpg')}}); }</style>
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<div class="d-flex flex-center flex-lg-start flex-column">
						<a href="#" class="mb-7">
							<img alt="Logo" src="{{asset('assets/media/logos/logo-white.png')}}" />
						</a>
						<h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2>
					</div>
				</div>
				<div class="d-flex flex-center w-lg-50 p-10">

					<div class="card rounded-3 w-md-550px">
						<div class="card-body p-10 p-lg-20">

							<form class="form w-100" id="reset_form" method="POST" action="{{ route('password.email') }}">
                                @csrf
								<div class="text-center mb-10">
									<h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
									<div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
								</div>
                                {{-- @include('admin.templates.partials.head-alert') --}}
								<div class="fv-row mb-8">
									<input type="email" placeholder="Email" name="email" autocomplete="off" value="{{old('email')}}" class="form-control bg-transparent" autofocus/>
								</div>
								<div class="d-flex flex-wrap justify-content-center pb-lg-0">
									<button type="button" id="reset_submit" class="btn btn-primary me-4">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
									<a href="{{route('dashboard')}}" class="btn btn-light">Cancel</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
        @include('admin.templates.partials.script')
        @include('admin.templates.partials.alert')
        <script>
            const form = document.getElementById('reset_form');
            var validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'email': {
                            validators: {
                                notEmpty: {
                                    message: 'Silahkan isi dengan format email!'
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

            // Submit button handler
            const submitButton = document.getElementById('reset_submit');
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
</html>
