<div class="col-12 col-sm-6 offset-sm-3">
    <div class="row vh-100 text-center  justify-content-center align-items-center px-2">
        <div class="chaudai w-sm-50 border border-1 h-auto m-2 rounded-3 bg-white shadow-lg" data-aos="flip-left" data-aos-duration="2000">
            <div data-aos="fade" data-aos-duration="2000" data-aos-delay="1000">
                <form action="<?php 
    $_SERVER['PHP_SELF']; 
    ?>" method="POST" enctype="multipart/form-data"
        autocomplete="off">
                    <div class="my-2 p-2">
                        <input id="name" class="w-100 p-2 rounded-2 border border-1 form-control" type="text" placeholder="Title" name="name" required>
                    </div>
                    <div class="my-2 p-2">
                        <input id="details" class="w-100 p-2 rounded-2 border border-1 form-control" type="text" placeholder="Details" name="details" required>
                    </div>
                    <div class="my-2 p-2">
                        <select id="email" class="w-100 p-2 rounded-2 border border-1 form-control" name="type" required>
                            <option value="0">--Select Type--</option>
                            <?php
                            $sqltype = "SELECT * FROM product_type";
                            $resulttype = mysqli_query($conn, $sqltype) or die("Can't Fetch Types");
                            if (mysqli_num_rows($resulttype) > 0) {
                                while ($row = mysqli_fetch_assoc($resulttype)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['type'] . '</option>';
                                }
                            }
                            ?>
                        </select>

                    </div>

                    <div class="my-2 p-2">
                        <input id="photo" class="w-100 p-2 rounded-2 border border-1 form-control" type="file" placeholder="Choose Image" name="photo" required>
                    </div>
                    <div class="my-2 p-2">
                        <input id="base_price" class="w-100 p-2 rounded-2 border border-1 form-control" type="text" placeholder="Base Price 10 - 1,00,000" name="base_price" required>
                    </div>
                    <div class="my-2 p-2">
                        <button id="add" name="add" type="submit" value="Submit" class="btn btn-primary w-100 p-2">Add</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['add'])) {
                    $name = strip_tags($_POST['name']);
                    $details = strip_tags($_POST['details']);
                    $type = strip_tags($_POST['type']);
                    // $photo = strip_tags($_POST['photo']);
                    $base_price = strip_tags($_POST['base_price']);
                    if($type == '0'){
                        echo "<script>alert('Please choose type...')</script>";
                    }else if($base_price <10 || !$base_price >= 100000){
                        echo "<script>alert('Please Choose price between 10 to 100000')</script>";
                    }else{
                        if (isset($_FILES['photo'])) {
                            $random = rand(1, 999);
                            $file_name = $_FILES['photo']['name'];
                            $file_size = $_FILES['photo']['size'];
                            $file_tmp = $_FILES['photo']['tmp_name'];
                            $file_type = $_FILES['photo']['type'];
                            $exp = explode('.', $file_name);
                            $file_ext = end($exp);
                            $extension = array("jpeg", "jpg", "png");

                            if (in_array($file_ext, $extension) === false) {
                                $error[] = "<script>alert('This extension file are not allowed, Please choose a JPG or PNG file.')</script>";
                            }
                            if ($file_size > 125829120) {
                                $error[] = "<script>alert('File size must be 10mb or lower.')</script>";
                            }
                            $target = time() . "-" . $random . ".jpg";
                            if (empty($error) == true) {
                                if (move_uploaded_file($file_tmp, "item_image/" . $target)) {
                                    $sql = "INSERT INTO products (user_id,name,details,type,image_url,base_price)
                                    VALUES ({$_SESSION['id']},'{$name}','{$details}',{$type},'{$target}',{$base_price})";
                                    if( mysqli_query($conn, $sql)){
                                        echo "<script>alert('Item add sucessfully.')</script>";
                                    }else{
                                        echo "<script>alert('Can't add item, please try after some time..')</script>";
                                    }

                                }else {
                                    echo "<script>alert('Image not upload.')</script>";
                                    die();
                                }
                            }else {
                                print_r($error);
                                die();
                            }
                        }else {
                            echo "<script>alert('Image not selected.')</script>";
                        }
                    }
                }

                ?>
            </div>
        </div>
    </div>
</div>