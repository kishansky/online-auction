<?php
include('templates/header.php');
include('templates/navbar.php');
include('templates/left.php');
include('classes/feed.php');
?>

<script src="./public/js/jquery.js"></script>
<script>
    var type = '<?php
        if(isset($_GET['type'])){
        echo $_GET['type'];
        }else{
            echo 0;
        }
    ?>';
    var user = '<?php
        if(isset($_GET['user'])){
        echo $_GET['user'];
        }else{
            echo 0;
        }
    ?>'
    var load_flag = 0;
    loadMore(load_flag);

    function loadMore(start) {
        // console.log(start,type);
        jQuery.ajax({
            url: 'includes/feed.php',
            data: {start:start,type:type,user:user },
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