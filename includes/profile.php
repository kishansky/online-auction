<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Choose Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  action="includes/save-photo.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="col-12">
					<input class="w-100 p-2 rounded-2 form-control form-control-sm" id="img" type="file" name="fileToUpload"  required>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" class="btn btn-success" value="Post" required />
                </div>
            </div>
            </form>
                
            
        </div>

        </div>
    </div>
</div>
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
                        <img src="./profile_photo/<?php echo $rowprofile['photo']; ?>" class="img-fluid rounded-circle mb-3" style="height: 15rem;" alt="Profile Picture">
                        <div style="margin-top:5px;">
                            <button class="btn btn-danger  " style="border:none;" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Change Profile</button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Profile Information -->
                        <h1 class="fw-bold m-2"><?php echo $rowprofile['name'] ?> </h1>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                            <ul class="list-unstyled">
                                <li class="m-2"><strong>Email:</strong> <?php echo $rowprofile['email'] ?></li>
                                <li class="m-2">
                                    <strong>Gender:</strong>
                                    <input class="" name="gender" id="male" value="1" type="radio" <?php

                                                                                                    if ($rowprofile['gender'] == 1) {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                    ?>>
                                    <label class="" for="male">Male</label>
                                    <input class="" name="gender" id="female" value="2" type="radio" <?php
                                                                                                        if ($rowprofile['gender'] == 2) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                    <label class="" for="female">Female</label>
                                    <input class="" name="gender" id="other" value="3" type="radio" <?php
                                                                                                    if ($rowprofile['gender'] == 3) {
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
                            } else {
                                $sqlupdate = "UPDATE users SET gender={$gender}, phone={$phone},dob={$dob},address='{$address}' WHERE id = {$_SESSION['id']}";
                                $resultupdate = mysqli_query($conn, $sqlupdate) or die("Connection Failed");
                                if ($resultupdate) {
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