{{ BsForm::textarea('about')->value(Settings::get('about')) }}
{{ BsForm::textarea('service')->value(Settings::get('service')) }}
{{ BsForm::textarea('privacy_policy')->value(Settings::get('privacy_policy')) }}
{{ BsForm::textarea('order_policy')->value(Settings::get('order_policy')) }}

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('about')
        CKEDITOR.replace('service')
        CKEDITOR.replace('privacy_policy')
        CKEDITOR.replace('order_policy')
    </script>
@endpush