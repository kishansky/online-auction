
<?php
include("config.php");
session_start();
$uid = $_SESSION["id"];
$random = rand(1000, 9999);
if(isset($_FILES['fileToUpload'])){
    $error = array();
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
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
        if (move_uploaded_file($file_tmp, "../profile_photo/" . $target)) {
            $sql = "UPDATE users SET photo = '{$target}' WHERE id = {$_SESSION['id']}";
            if( mysqli_query($conn, $sql)){
                header("Location:{$hostname}/profile.php");
            }else{
                echo "<script>alert('Can't update, please try after some time..')</script>";
            }
            echo $target;
            echo "<br>";
            echo $_SESSION['id'];
        }else {
            echo "<script>alert('Image not upload.')</script>";
            die();
        }
    }else {
        print_r($error);
        die();
    }
}else{

        echo "no upload";
}



?>