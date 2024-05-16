<?php
include('templates/header.php');
include('templates/navbar.php');
include('classes/feed.php');
?>

<script src="./public/js/jquery.js"></script>
<script>
    
    var load_flag = 0;
    loadMore(load_flag);
    var load = false;
    function loadMore(start) {
        // console.log(start,type);
        jQuery.ajax({
            url: 'includes/wishlist.php',
            data: {start:start},
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
    function myLike(id){
        jQuery.ajax({
            url: 'includes/like.php',
            data: 'p_id=' + id,
            type: 'post',
            success: function(result) {
                // console.log(result);
                
            }
        });
    }
    document.addEventListener("DOMContentLoaded", function() {
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('valueButton')) {
            if(event.target.style.color == "black"){
                event.target.style.color ='blue';
            }else{
                event.target.style.color ='black';
            }
            if (event.target.textContent == 'Like') {
                
                event.target.textContent = 'Liked';
            } else {
                event.target.textContent = 'Like';
            }
        }
    });
});
</script>
<?php
include('templates/footer.php');
?>