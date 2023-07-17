<div>
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
                    <form class="form"{{ $attributes }} a method="post" id="modal_form_form">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="d-flex flex-column fv-row">
                            <div class="row">
                                {{$slot}}
                            </div>
                        </div>
                        <x-admin.button.modal />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
