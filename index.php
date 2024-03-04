<?php
include('templates/header.php');
include('templates/navbar.php');
include('templates/left.php');
include('classes/feed.php');
?>

<script src="./public/js/jquery.js"></script>
<script>
    var load_flag = 0;
    loadMore(load_flag);

    function loadMore(start) {
        jQuery.ajax({
            url: 'includes/feed.php',
            data: 'start=' + start,
            type: 'post',
            success: function(result) {
                jQuery('#feed-area').append(result);
                load_flag += 2;
            }
        });
    }
    jQuery(document).ready(function() {

        jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop() >= jQuery(document).height() - jQuery(window).height() - 150) {
                loadMore(load_flag);
            }
        });
    });
</script>
<?php
include('templates/footer.php');
?>