<script src="{{ asset("backend/plugins/parsleyjs/parsley.min.js") }}"></script>
<script src="{{ asset("backend/plugins/parsleyjs/vi.js") }}"></script>
<script src="{{ asset("backend/assets/js/custom.js") }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        if ($('form').length > 0) {
            Parsley.setLocale('{{env('LOCALE_DEFAULT')}}');
            $('form').parsley();
        }
    });
</script>