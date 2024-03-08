<div class="row my-4">
    <div class="col-md-8 ">
        <div class="row">
            <?php
            $sqlprofile = "SELECT * FROM users WHERE id = {$_SESSION['id']}";
            $resultprofie = mysqli_query($conn, $sqlprofile) or die("Profile Fetch Error");
            if (mysqli_num_rows($resultprofie) > 0) {
                while ($rowprofile = mysqli_fetch_assoc($resultprofie)) {
            ?>
                    <div class="col-md-4 text-center ">
                        <!-- Profile Picture -->
                        <img src="./profile_photo/default.jpg" class="img-fluid rounded-circle mb-3" style="height: 15rem;" alt="Profile Picture">
                    </div>
                    <div class="col-md-8">
                        <!-- Profile Information -->
                        <h1 class="fw-bold m-2"><?php echo $rowprofile['name'] ?> </h1>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                            <ul class="list-unstyled">
                                <li class="m-2"><strong>Email:</strong> <?php echo $rowprofile['email'] ?></li>
                                <li class="m-2">
                                    <strong>Gender:</strong>
                                    <input class="" name="gender" id="male" value="0" type="radio" <?php

                                                                                                    if ($rowprofile['gender'] == 0) {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                    ?>>
                                    <label class="" for="male">Male</label>
                                    <input class="" name="gender" id="female" value="1" type="radio" <?php
                                                                                                        if ($rowprofile['gender'] == 1) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                    <label class="" for="female">Female</label>
                                    <input class="" name="gender" id="other" value="2" type="radio" <?php
                                                                                                    if ($rowprofile['gender'] == 2) {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                    ?>>
                                    <label class="" for="other">Other</label>
                                </li>
                                <li class="m-2">
                                    <strong>Phone:</strong>
                                    <input name="phone" class="p-1 my-1 rounded-2 border border-1 form-control" maxlength="10" type="text" value="<?php echo $rowprofile['phone']; ?>">
                                </li>

                                <li class="m-2">
                                    <strong>Date of Birth:</strong>
                                    
                                    <input name="dob" class="p-1 my-1 rounded-2 border border-1 form-control" type="date" value="<?php echo $rowprofile['dob']; ?>">
                                </li>
                                <li class="m-2">
                                    <strong>Address:</strong>
                                    <input name="address" class="p-1 my-1 rounded-2 border border-1 form-control" type="text" value="<?php echo $rowprofile['address']; ?>">
                                </li>
                                <li class="m-2 text-center">
                                    <input name="save" class="btn btn-success m-2" type="submit" value="save">
                                </li>
                            </ul>
                        </form>
                        <?php
                        if (isset($_POST['save'])) {
                            $gender = strip_tags($_POST['gender']);
                            $phone = strip_tags($_POST['phone']);
                            $dob = strip_tags($_POST['dob']);
                            $address = strip_tags($_POST['address']);
                            if (empty($gender) || empty($dob) || strlen($address) < 10) {
                                echo "<script> alert('Please fill all field correctly'); </script>";
                            }else{
                                $sqlupdate = "UPDATE users SET gender={$gender}, phone={$phone},dob={$dob},address='{$address}' WHERE id = {$_SESSION['id']}";
                                $resultupdate = mysqli_query($conn, $sqlupdate) or die("Connection Failed");
                                if($resultupdate){
                                    header("Location:{$hostname}/profile.php");
                                }
                            }
                        }
                        ?>
                    </div>
        </div>
<?php
                }
            }
?>
    </div>
</div>