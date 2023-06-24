<html lang="en">
	@include('admin.templates.partials.head')
	<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<div class="d-flex flex-column flex-root">
			<style>body { background-image: url({{asset('assets/media/bg/login2.jpg')}}); }</style>
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
							<form class="form w-100" id="modal_form_login" method="POST" action="{{ route('login') }}">
                                @csrf
								<div class="text-center mb-11">
									<h1 class="text-dark fw-bolder mb-3">Sign In</h1>
									<div class="text-gray-500 fw-semibold fs-6">Dashboard Aplication</div>
								</div>

                                @include('admin.templates.partials.alert')

								<div class="fv-row mb-8">
									<input type="text" placeholder="Username / Email" name="identity" autocomplete="off" class="form-control bg-transparent" value="{{old('identity')}}" autofocus/>
								</div>
								<div class="fv-row mb-5">
									<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
								</div>
                                <div class="fv-row mb-10">
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="remember" value=""/>
                                        <span class="form-check-label">
                                            <div class="text-gray-500 fw-semibold fs-6">Remember</div>
                                        </span>
                                    </label>
                                </div>

								<div class="d-grid mb-10">
									<button type="submit" id="form_submit" class="btn btn-primary">
										<span class="indicator-label">Sign In</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<div class="text-gray-500 text-center fw-semibold fs-6">
                                    <a href="{{ route('password.request') }}" class="link-primary">Lupa Password ?</a>
                                </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
        @include('admin.templates.partials.script')
        <script>
            const form = document.getElementById('modal_form_login');
            var validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'identity': {
                            validators: {
                                notEmpty: {
                                    message: 'Silahkan isi username / email!'
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
            const submitButton = document.getElementById('form_submit');
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
