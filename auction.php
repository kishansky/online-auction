<?php
include('templates/header.php');
include('templates/navbar.php');
// include('includes/config.php');
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
            $self = false;
            if ($row['user_id'] == $_SESSION['id']) {
                $self = true;
            }

    ?>
            <div class=" row col-12">
                <div class="col-sm-6 rounded rounded-4 p-2 ">
                    <img src="item_image/<?php echo $row['image_url']; ?>" style="height: 100%; width:100%;" class=" rounded rounded-2 ">

                </div>
                <div class="col-sm-6 p-2 ">
                    <div class="border border-1 rounded  rounded-4 ">
                        <h3 class="text-center text-primary fw-bold py-1 ">Product Details</h3>

                        <table class="table table-striped table-responsive w-100 mb-0">
                            <tr>
                                <th scope="col">Report : </th>
                                <td><button class="btn btn-sm btn-danger p-0 px-2" data-bs-toggle="modal" data-bs-target="#myModal"> Report</button></td>
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
                            <tr id="bid_time">
                                <th scope="col">Auction Start in : </th>
                                <td>
                                    <p id="countdown" class="m-0">loading</p>
                                </td>
                            </tr>
                            <!-- <div id="bidding">

                            </div> -->
                        </table>
                        <table class="table  table-striped-columns  table-responsive w-100 p-0 mb-0">
                            <tbody id="bidding">

                            </tbody>
                        </table>

                        <!-- The Modal -->
                        <div class="modal " id="myModal">
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
    let id = <?php echo $id; ?>;
    let user_id = <?php echo $_SESSION['id']; ?>;
    let status = false;

    var conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function(e) {
        console.log("Connection established!");
    };

    conn.onmessage = function(e) {
        if (e.data == id) {
            update();
        }
        console.log(e.data);
    };

    console.log(id);
    let b;

    function nextDate() {
       

        jQuery.ajax({
            url: 'includes/next-date.php',
            data: {
                id: id
            },
            type: 'post',
            success: function(result) {
                jQuery('#bid_time').html(result);
                
            }
        });
    }

    function update() {
        nextDate();
        isBidding();

    }

    function isBidding() {

        jQuery.ajax({
            url: 'includes/is-bidding.php',
            data: {
                id: id
            },
            type: 'post',
            success: function(result) {
                // console.log(result);
                // console.log('yup');
                jQuery('#bidding').html(result);
            }
        });
    }

    function checkAuction() {
        jQuery.ajax({
            url: 'includes/check-auction.php',
            data: {
                id: id
            },
            type: 'post',
            success: function(result) {
                // console.log(result);
                jQuery('#bidding').html(result);
                status = true;
            }
        });
    }
    <?php
    if ($self == false) {

    ?>

        function bid(price) {
            jQuery.ajax({
                url: 'includes/bidding.php',
                data: {
                    id: id,
                    price: price,
                    user_id: user_id,
                },
                type: 'post',
                success: function(result) {
                    if (result == 'success') {
                        update();
                        conn.send(id);
                    }
                }
            });

        }
    <?php
    } else {

    ?>

        function bid(price) {
            alert("You can't bid on your own items. You can only watch the bidding.🙂")
        }
    <?php
    }
    ?>

    // Function to update the countdown timer
    function updateCountdown() {
        var targetEndTime = document.getElementById('end');
        targetEndTime = targetEndTime.getAttribute("val");
        targetEndTime = Number(targetEndTime);
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
        if (hours == 0) {

            document.getElementById('countdown').innerHTML = minutes + " Min " + seconds + " Sec";
        } else {
            document.getElementById('countdown').innerHTML = hours + " Hrs " + minutes + " Min " + seconds + " Sec";
        }
        if (remainingTime == 0) {
            document.getElementById('end').innerHTML = "Auction Started";
            update();
            clearInterval(a);
            a = null;
            let b = setInterval(updateCountdown2, 1000);

        }

    }


    function updateCountdown2() {
        var targetEndTime = document.getElementById('countdown');
        targetEndTime = targetEndTime.getAttribute("val");
        // console.log(targetEndTime);
        targetEndTime = Number(targetEndTime);
        // Calculate the remaining time until the target end time
        var currentTime = Math.floor(Date.now() / 1000);
        var remainingTime = targetEndTime - currentTime;
        // console.log(currentTime);
        // console.log(remainingTime);

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

        if (hours == 0) {
            document.getElementById('countdown').innerHTML = minutes + " Min " + seconds + " Sec";
        } else {
            document.getElementById('countdown').innerHTML = hours + " Hrs " + minutes + " Min " + seconds + " Sec";
        }
        if (remainingTime == 0) {
            document.getElementById('countdown').innerHTML = "Auction end";
            if(status ==false){


                checkAuction();
            }


        }
    }

    // Update the countdown timer every second
    let a = setInterval(updateCountdown, 1000);

    // Call updateCountdown once initially to avoid one-second delay
    updateCountdown();
</script>

<?php
include "templates/footer.php"
?>