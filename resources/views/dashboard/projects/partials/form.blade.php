{{ BsForm::text('name') }}
{{ BsForm::text('location') }}
{{ BsForm::text('area') }}
{{ BsForm::text('contact') }}
{{ BsForm::text('price') }}
{{ BsForm::select('category')->options(trans('projects.categories')) }}
{{ BsForm::file('images[]')->attribute('multiple', true)->label(trans('projects.attributes.images')) }}

@push('scripts')
    <script>
        if ($("#category").val() === 'buildings') {
            $("#price").parent('.form-group').fadeOut()
        } else {
            $("#price").parent('.form-group').fadeIn()
        }

        $("#category").on('change', function () {
            if ($(this).val() === 'buildings') {
                $("#price").parent('.form-group').fadeOut()
            } else {
                $("#price").parent('.form-group').fadeIn()
            }
        })
    </script>
@endpush