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
</script>

<script>
    function readURL(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#category_image').hide();
            $('#category_image_placeholder')
                .attr('src',e.target.result)
                .width(60)
            };
        reader.readAsDataURL(input.files[0]);
        }
    }
</script>

