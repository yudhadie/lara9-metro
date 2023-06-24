 <div class="modal fade" id="modal_add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Add {{$title ?? ''}}</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form class="form" action="{{ route('user.store') }}" method="post" id="modal_form_form" enctype="multipart/form-data">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="d-flex flex-column fv-row">
                        <div class="row">
                            <div class="col-6 mb-5">
                                <label class="fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Username</span>
                                </label>
                                <input class="form-control form-control-solid" oninput="this.value=this.value.toLowerCase()" placeholder="Enter a username" name="username" autofocus/>
                            </div>
                            <div class="col-12 mb-5">
                                <label class="fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Name</span>
                                </label>
                                <input class="form-control form-control-solid" placeholder="Enter a name" name="name" autofocus/>
                            </div>
                            <div class="col-6 mb-5">
                                <label class="fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Email</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Email tidak boleh sama"></i>
                                </label>
                                <input class="form-control form-control-solid" type="email" placeholder="Email" name="email"/>
                            </div>
                            <div class="col-6 mb-5">
                                <label class="fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Password</span>
                                </label>
                                <input class="form-control form-control-solid" type="password" placeholder="Password" name="password"/>
                            </div>
                            <div class="col-6 mb-5">
                                <label class="fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Role</span>
                                </label>
                                <select name="current_team_id" data-control="select2" data-dropdown-parent="#modal_add" data-placeholder="Pilih Role..." class="form-control form-control-solid">
                                    <option value="">Select a Roles...</option>
                                    @foreach ($teams as $team)
                                        <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mb-5">
                                <label class="fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Status</span>
                                </label>
                                <select name="active" data-control="select2" data-dropdown-parent="#modal_add" data-placeholder="Pilih Status..." class="form-control form-control-solid">
                                    <option value="1">Active</option>
                                    <option value="0">Non Active</option>
                                </select>
                            </div>
                            <div class="col-12 mb-5">
                                <label class="fs-6 fw-semibold form-label mb-2">
                                    <span>Photo</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Optional"></i>
                                </label>
                                <input type="file" class="form-control form-control-solid" name="photo" placeholder="Photo" accept=".jpg,.jpeg,.png"/>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-primary" id="modal_form_submit" data-kt-permissions-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
