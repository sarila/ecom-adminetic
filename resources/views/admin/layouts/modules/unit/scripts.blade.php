<script>
    $(function(){
        // Code Generation
        $( document ).ready(function() {
            let random = Math.floor((Math.random() * 1000000) + 1);
            $('#code').val(random);
        });
        $('#code_reload').on('click',function(){
           let random = Math.floor((Math.random() * 1000000) + 1)
           $('#code').val(random);
        });
    });

    $(document).ready(function() {
        $('#baseunit').on('change', function() {
            var value = $(this).val();

            if (value == 0) {
                $('#operator').show();
            } else {
                $('#operator').hide();
            }
        })
    })
</script>
