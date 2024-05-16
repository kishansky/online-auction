<?php
include('templates/header.php');
include('templates/navbar.php');
?>
<div id="feed-area" class="col-sm-4 col-12 offset-sm-1 mt-2">

</div> 
<script src="./public/js/jquery.js"></script>
<script>
   
    var load_flag = 0;
    loadMore(load_flag);
    var load = false;
    function loadMore(start) {
        jQuery.ajax({
            url: 'includes/purchase.php',
            data: {start:start },
            type: 'post',
            success: function(result) {
                // console.log(result);
                jQuery('#feed-area').append(result);
                load_flag += 2;
                load = true;
            }
        });
    }
    jQuery(document).ready(function() {
        jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop() >= jQuery(document).height() - jQuery(window).height() - 150) {
                if(load == true){
                    loadMore(load_flag);
                   load = false;
                }
            }
        });
    });
</script>
<?php
include('templates/footer.php');
?>