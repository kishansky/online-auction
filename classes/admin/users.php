<?php
include ('header.php');
include ('navbar.php');

?>
<table class="table table-striped table-responsive w-100 mb-0">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone no</th>
        <th>Address</th>
    </thead>
    <tbody id="feed-area">

    </tbody>
</table>
<script>
var load_flag = 0;
    loadMore(load_flag);
    var load = false;
    function loadMore(start) {
        // console.log(start,type);
        jQuery.ajax({
            url: 'load-users.php',
            data: {start:start},
            type: 'post',
            success: function(result) {
                jQuery('#feed-area').append(result);
                load_flag += 10;
                load = true;
            }
        });
    }
    jQuery(document).ready(function() {

        jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop() >= jQuery(document).height() - jQuery(window).height() ) {
                if(load == true){
                    loadMore(load_flag);
                    console.log(load_flag);
                   load = false;
                }

            }
        });
    });
  

</script>

<?php
include ('footer.php');
?>