<script>
    $(document).ready(function() {
        $('#type').on('change', function () {
            var taxtype = $(this).val();
            var maxfield = 100;
            var value = $('#value').val();
            if (taxtype == 0) {
                $('#tax_symbol').text('Rs.');
            }
            else {
                $('#tax_symbol').text('%');
                $('#value').attr('max', maxfield);
                if (value >= maxfield) {
                    $('#value').attr('disabled', ' ');
                }

            }
        });
    });
</script>
