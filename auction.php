<?php
include('templates/header.php');
include('templates/navbar.php');
include('includes/config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: index.php");
}

?>
<div class="row m-sm-4  m-0 p-0">
    <?php
    $sql = "SELECT products.* , product_type.id,product_type.type AS typename FROM products LEFT JOIN product_type ON products.type = product_type.id WHERE products.id = {$id} ";
    $result = mysqli_query($conn, $sql) or die("Query unsuccessful!");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

    ?>
            <div class=" row col-12">
                <div class="col-sm-6 rounded rounded-4 p-2 ">
                    <img src="item_image/<?php echo $row['image_url']; ?>" class="w-100 rounded rounded-2 ">

                </div>
                <div class="col-sm-6 p-2 ">
                    <div class="border border-1 rounded  rounded-4 ">
                        <h3 class="text-center text-primary fw-bold pt-3 ">Product Details</h3>

                        <table class="table table-striped table-responsive w-100 ">
                            <tr>
                                <th scope="col">Report : </th>
                                <td><button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#myModal"> Report</button></td>
                            </tr>
                            <tr>
                                <th scope="col">Name : </th>
                                <td><?php echo $row['name']; ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Details : </th>
                                <td><?php echo $row['details']; ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Type : </th>
                                <td><?php echo $row['typename']; ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Base Price : </th>
                                <td>&#8377; <?php echo $row['base_price']; ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Auction Date : </th>
                                <td>
                                    <p id="end" class="m-0" val="<?php echo strtotime($row['auction_date']); ?>"><?php echo $row['auction_date']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Auction Start in : </th>
                                <td>
                                <p id="countdown" class="m-0">loading</p>
                                </td>
                            </tr>
                           
                        </table>
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Report</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="includes/report.php" method="post">
                                            <input class="w-100 p-2 rounded-2 border border-1 form-control my-2 " type="text" placeholder="Describe" name="description" required>
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    
                                            <button type="submit" class="btn btn-primary mt-2" name="report">Submit</button>
                                        </form>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
    <?php
        }
    } else {
        echo "<p>No Data Found!</p>";
    }
    ?>
</div>



<script src="./public/js/jquery.js"></script>
<script>
    var conn = new WebSocket('ws://localhost:8080');
conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    console.log(e.data);
};
</script>

<script>
    let id = <?php echo $id; ?>;
    console.log(id);
    // jQuery.ajax({
    //     url: 'includes/show-item.php',
    //     data: {id:id},
    //     type: 'post',
    //     success: function(result) {
    //         jQuery('#feed-area').append(result);
    //         load_flag += 2;
    //     }
    // });
    // Function to update the countdown timer
    function updateCountdown() {
        
        var targetEndTime = document.getElementById('end');
        targetEndTime = targetEndTime.getAttribute("val");
        targetEndTime = Number(targetEndTime);
        // console.log(targetEndTime);
        // Calculate the remaining time until the target end time
        var currentTime = Math.floor(Date.now() / 1000);
        var remainingTime = targetEndTime - currentTime;

        // If the countdown has reached zero or the end time has passed, set remaining time to 0
        if (remainingTime <= 0) {
            remainingTime = 0;
        }

        // Convert remaining time to hours, minutes, seconds
        var days = Math.floor(remainingTime / (3600 * 24));
        var hours = Math.floor(remainingTime / 3600);
        var minutes = Math.floor((remainingTime % 3600) / 60);
        var seconds = remainingTime % 60;

        // Display the remaining time
        document.getElementById('countdown').innerHTML = hours + " Hrs " + minutes + " Min " + seconds + " Sec";
        if(remainingTime == 0){
            document.getElementById('countdown').innerHTML = "Auction Ended";
        }
    }

    // Update the countdown timer every second
    setInterval(updateCountdown, 1000);

    // Call updateCountdown once initially to avoid one-second delay
    updateCountdown();
</script>

<?php
include "templates/footer.php"
?>