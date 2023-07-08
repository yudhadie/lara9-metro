<script>
    const form = document.getElementById('modal_form_form');
    var validator = FormValidation.formValidation(
        form,
        {
            {{$slot}}
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
    const submitButton = document.getElementById('modal_form_submit');
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
